<div align="center">

# 📊 Google Play Review Sentiment Analysis System
### *BERT Transformer Pipeline & PHP-MySQL Analytics Dashboard*

[![Python](https://img.shields.io/badge/Python-3.10%2B-blue?logo=python&logoColor=white)](https://python.org)
[![PyTorch](https://img.shields.io/badge/PyTorch-2.x-EE4C2C?logo=pytorch&logoColor=white)](https://pytorch.org)
[![BERT](https://img.shields.io/badge/Model-BERT%20Transformer-yellow?logo=huggingface&logoColor=white)](https://huggingface.co)
[![PHP](https://img.shields.io/badge/PHP-8.x-777BB4?logo=php&logoColor=white)](https://php.net)
[![MySQL](https://img.shields.io/badge/MySQL-Database-4479A1?logo=mysql&logoColor=white)](https://mysql.com)
[![Open In Colab](https://colab.research.google.com/assets/colab-badge.svg)](https://colab.research.google.com)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

---

</div>

## 📌 Project Overview

This repository hosts an end-to-end **Natural Language Processing (NLP) & Analytics Platform** designed to scrape, analyze, and visualize user feedback from Google Play Store applications. 

By leveraging a fine-tuned **BERT (Bidirectional Encoder Representations from Transformers)** model, the system evaluates contextual sentiment beyond simple keyword matching and pipes structured metrics into a custom **PHP/MySQL web dashboard** for executive reporting.

> **Business Value:** Enables product managers and developers to automatically track app store sentiment trends, identify recurring user pain points, and make data-driven feature decisions.

---

## ⚙️ System Architecture & Data Flow

```text
 ┌──────────────────────┐     ┌──────────────────────┐     ┌──────────────────────┐
 │ Google Play Scraping │ ──► │  BERT Fine-Tuned ML  │ ──► │ MySQL Database Engine│
 │ API & Tokenization   │     │ Sentiment Scoring    │     │ Ingestion & Storage  │
 └──────────────────────┘     └──────────────────────┘     └──────────┬───────────┘
                                                                      │
                                                           ┌──────────▼───────────┐
                                                           │ PHP Web Analytics    │
                                                           │ Interactive Dashboard│
                                                           └──────────────────────┘
