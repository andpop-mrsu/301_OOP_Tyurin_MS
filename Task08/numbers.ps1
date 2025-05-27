function Show-Date_Info {
    $today = Get-Date
    $day = $today.Day
    $month = $today.Month
    $year = $today.Year

    $baseUrl = "http://numbersapi.com"

    $monthDayUrl = "$baseUrl/$month/$day/date"
    $dayUrl = "$baseUrl/$day"
    $yearUrl = "$baseUrl/$year/year"

    Write-Host "Сегодня: $day.$month.$year"

    foreach ($url in @($monthDayUrl, $dayUrl, $yearUrl)) {
        try {
            $response = Invoke-WebRequest -Uri $url -UseBasicParsing
            Write-Host $response.Content
        } catch {
            Write-Host "Не удалось получить данные с $url"
        }
    }
}

Show-Date_Info
