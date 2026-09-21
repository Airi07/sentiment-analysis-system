# Sentiment Analysis System

An AI-powered web application designed to analyze Google Play application reviews and present interactive sentiment metrics through a dynamic web interface.

---

## Overview

This project provides an end-to-end workflow for processing app user feedback. It utilizes an offline machine learning pipeline powered by a fine-tuned BERT model to analyze review sentiments. The resulting predictions and analytics are stored in a MySQL database and served via a responsive web dashboard for evaluation.

---

## Key Features

- **Sentiment Analytics Dashboard:** Interactive data visualizations for app review sentiment distributions.
- **Offline ML Pipeline:** Fine-tuned BERT model for precise sentiment classification on app reviews.
- **Data Preprocessing & Cleaning:** Structured data preparation pipelines using Jupyter Notebooks.
- **User & Admin Management:** Secure backend access for reviewing metrics and system activity logs.

---

## System Architecture & ML Pipeline

The machine learning workflow operates independently of the live web interface to ensure optimal application performance:

1. **Data Collection & Cleaning (`notebooks/`):**
   - `dataset_processing.ipynb` & `fixing_csv.ipynb`: Cleaning and structuring raw Google Play review data.
   - `correlation_analysis.ipynb`: Statistical analysis of user rating trends and sentiment markers.

2. **Model Training & Inference (`notebooks/`):**
   - `bert_training.ipynb`: Fine-tuning a pre-trained BERT model on review datasets.
   - `trained_bert.ipynb`: Model evaluation and generation of prediction datasets.

3. **Web Application Dashboard:**
   - Pre-calculated sentiment predictions are ingested into a MySQL database.
   - The PHP dynamic dashboard retrieves and visualizes sentiment trends in real time.

---

## Project Structure

```text
FYP_Project/
│
├── CSS/                  # Stylesheets for admin and user dashboards
├── Javascript/           # Frontend interactivity and chart renderings
├── PHP/                  # Application backend and database connections
│   ├── admin/            # Admin control panel and log management
│   ├── config/           # Database and base path setup
│   ├── includes/         # Session authentication and activity logs
│   └── user/             # User views and sentiment pages
│
├── notebooks/            # Machine Learning & Data Processing Notebooks
│   ├── dataset_processing.ipynb
│   ├── correlation_analysis.ipynb
│   ├── bert_training.ipynb
│   ├── trained_bert.ipynb
│   └── fixing_csv.ipynb
│
├── Picture/              # Static assets and UI images
├── index.php             # Main entry point
└── README.md             # Project documentation
