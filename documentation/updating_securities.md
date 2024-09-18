## Updating securities

### Description

Updating securities is a process of getting securities list from the data providers and saving it to the database.
Later we run different trading strategies against each active security.
Frequency of update should be each day because every day some security becomes delisted.

### Purpose

To have updated list of securities and their active and delisted status.

### Rules

- only securities with 4 characters and less. Those with more characters are derived securities.
- only stocks (not ETFs) from NASDAQ and NYSE exchanges. Others are too obscure for now.
