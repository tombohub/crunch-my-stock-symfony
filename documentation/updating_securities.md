## Updating securities

### Description

Updating securities is a process of getting securities list from the data providers and saving it to the database.
Later we run different trading strategies against each active security.
Frequency of update should be each day because every day some security becomes delisted.

### Purpose

To have updated list of securities and their active and delisted status.

### Rules

- only securities with 4 characters and less. Those with more characters are derived securities.
- only security type stocks (not ETFs) from NASDAQ and NYSE exchanges for now.
- include delisted securities for avoding survirorship bias in backtesting
- exclude symbols reused by different companies. Ones delisted than listed under different company. To make it simple for now.

### Provider

[Alphavantage](https://www.alphavantage.co/documentation/#listing-status): has specific endpoint for active and delisted securities

### Workflow

1. Get active and delisted securities data from Alphavantage
2. Filter out the ones where symbol was delisted than listed again
