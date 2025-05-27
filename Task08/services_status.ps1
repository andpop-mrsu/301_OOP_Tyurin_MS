Write-Host "Status  Name"
Write-Host "------  ----"
Get-Service | ForEach-Object {
    if ($_.Status -eq 'Running') {
        Write-Host "$($_.Status) $($_.Name)" -ForegroundColor Green
    } elseif ($_.Status -eq 'Stopped') {
        Write-Host "$($_.Status) $($_.Name)" -ForegroundColor Red
    } else {
        $statusStr = "$($_.Status)"
        if ($statusStr.Length -gt 7) {
            $shortStatus = $statusStr.Substring(0, 5) + "..."
        } else {
            $shortStatus = $statusStr
        }
        Write-Host "$($shortStatus) $($_.Name)"
    }
}