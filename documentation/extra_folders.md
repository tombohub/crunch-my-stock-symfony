# Extra folder

Additional folders used beside Symfony regular folders

## Data

- path: `%kernel.project_dir%/data`

  Data fetched from data providers and saved to the files.
  Reason is so we can append data from each request and make it into one file which is easier to manipulate and save into database.
  Each Data provider has separate folder.
  Each file is named as {endpoint}\{YYYY-MM-DD}.{extension}
