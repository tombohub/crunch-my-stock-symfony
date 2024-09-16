# symfony-console.ps1

if ($args.Length -eq 0) {
    Write-Host "No arguments provided."
    exit
}

# Construct the command
$command = "symfony console " + ($args -join " ")

# Execute the command
Invoke-Expression $command