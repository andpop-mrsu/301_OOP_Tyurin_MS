$exel = New-Object -ComObject Excel.Application

$Myworkbook = $exel.Workbooks.Add()
$Sheet = $Myworkbook.Worksheets.Item(1)

$Sheet.Cells.Item(2, 2) = [System.Text.Encoding]::UTF8.GetString([System.Text.Encoding]::Default.GetBytes("Привет от PowerShell"))
$Sheet.Cells.Item(2, 2).Font.Italic = $true
$Sheet.Cells.Item(2, 2).Font.Size = 12

$currentUser = $env:USERNAME
$computerName = $env:COMPUTERNAME

$path = Join-Path $PSScriptRoot "$currentUser`_$computerName.xlsx"

$Myworkbook.SaveAs($path)
$Myworkbook.Close()
$exel.Quit()