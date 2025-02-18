# 台灣養殖漁業資料庫 Taiwan Aquaculture Database

這個專案用於保存來自 [台灣養殖漁業資料庫](https://fadopen.fa.gov.tw/fadopen/service/qrySpeciesSummaryYearlyReport.htmx) 的歷史資料。

This project archives historical data from the [Taiwan Aquaculture Database](https://fadopen.fa.gov.tw/fadopen/service/qrySpeciesSummaryYearlyReport.htmx).

## 資料說明 Data Description

中文版 (Chinese):
* 資料來源: 漁業署養殖漁業資料庫
* 時間範圍: 民國89年至今
* 資料類型: 各養殖魚種的年度統計資料

English:
* Data Source: Fisheries Agency Aquaculture Database
* Time Range: Year 2000 to present
* Data Type: Annual statistics for various aquaculture species

## 資料結構 Data Structure

```
/raw
  /specie                    - Raw data classified by species
    /{species_name}          - Directory for each species
      {year}.csv            - Annual data files
```

## 資料更新 Data Updates

中文版 (Chinese):
使用 scripts/01_fetch.php 程式從漁業署網站下載最新資料。程式會自動:
* 建立各魚種的資料夾結構
* 下載缺少的歷史資料
* 更新當年度資料

English:
Use scripts/01_fetch.php to download the latest data from the Fisheries Agency website. The script will automatically:
* Create directory structure for each species
* Download missing historical data
* Update current year data

## 授權條款 License

中文版 (Chinese):
此開放資料之授權，依據漁業署 [資料開放授權條款](https://data.gov.tw/license) 辦理。

English:
This open data is licensed under the [Open Government Data License](https://data.gov.tw/license) of the Fisheries Agency.
