# Extra folder

Additional folders used beside Symfony regular folders

## Data

- path: `%kernel.project_dir%/var/tmp/data`

  Data fetched from data providers and saved to the files.
  Reason is so we can append data from each request and make it into one file which is easier to manipulate and save into database.
  Each Data provider has separate folder.
  Each file is named as {endpoint}\_{YYYY-MM-DD}.{extension}

## Libs

- path: `src/Lib`

Custom libraries, utilities and 3rd party libraries wrappers. Meant to use accross application or simply a standalone utility.
