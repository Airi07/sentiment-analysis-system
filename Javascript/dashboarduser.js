let chart;

function esc(s) {
  return String(s ?? "").replace(/[&<>"']/g, (m) => ({
    "&": "&amp;", "<": "&lt;", ">": "&gt;", '"': "&quot;", "'": "&#39;"
  }[m]));
}

function tagClass(sent) {
  if (sent === "positive") return "tag pos";
  if (sent === "neutral") return "tag neu";
  return "tag neg";
}

async function fetchSentiment(appName) {
  const base = window.__BASE_URL__ || "";
  const url = `${base}/PHP/user/api_sentiment.php?app=${encodeURIComponent(appName)}`;
  const res = await fetch(url, { credentials: "same-origin" });
  return res.json();
}

function renderSamples(samples) {
  const wrap = document.getElementById("sample-list");
  if (!samples || samples.length === 0) {
    wrap.innerHTML = `<div class="placeholder mini">No sample reviews found.</div>`;
    return;
  }
  wrap.innerHTML = samples.map(s => `
    <div class="sample-item">
      <span class="${tagClass(s.sentiment)}">${esc(s.sentiment)}</span>
      <div class="sample-text">${esc(s.text)}</div>
    </div>
  `).join("");
}

function renderChart(counts) {
  const ctx = document.getElementById("sentChart");
  const data = [counts.positive || 0, counts.neutral || 0, counts.negative || 0];

  if (chart) chart.destroy();

  chart = new Chart(ctx, {
    type: "doughnut",
    data: {
      labels: ["Positive", "Neutral", "Negative"],
      datasets: [{ data }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: "62%",
      plugins: { legend: { position: "bottom" } }
    }
  });
}

document.addEventListener("DOMContentLoaded", () => {
  const input = document.getElementById("app-search");
  const btn = document.getElementById("search-btn");
  const status = document.getElementById("search-status");
  const totalBadge = document.getElementById("total-badge");

  async function doSearch() {
    const appName = input.value.trim();
    if (!appName) {
      status.textContent = "Please type an app name.";
      return;
    }

    status.textContent = `Searching for "${appName}"...`;
    totalBadge.textContent = "";

    try {
      const data = await fetchSentiment(appName);
      if (!data.ok) {
        status.textContent = data.message || "Failed to load data.";
        return;
      }

      status.textContent = `Results for "${appName}"`;
      totalBadge.textContent = `Total: ${data.total}`;
      renderChart(data.counts);
      renderSamples(data.samples);

    } catch (e) {
      status.textContent = "Error loading chart data. Check API + table columns.";
      console.error(e);
    }
  }

  btn.addEventListener("click", doSearch);
  input.addEventListener("keydown", (e) => {
    if (e.key === "Enter") doSearch();
  });
});
