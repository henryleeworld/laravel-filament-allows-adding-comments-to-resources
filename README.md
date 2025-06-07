# Laravel 12 Filament 資源允許加入評論

Filament 資源允許加入評論採用快速建立簡捷的 TALL（Tailwind CSS、Alpine.js、Laravel 和 Livewire）堆疊應用程式的工具組，評論是推動事情向前發展的好方法，使用評論以便提問、提供額外資訊或提供深入見解，表情符號可以協助釐清數位溝通背後的含義，以及所表達情感的類型和強度，在留言中 @ 提及成員，可確保您的訊息被看到。 

## 使用方式
- 打開 php.ini 檔案，啟用 PHP 擴充模組 intl 和 zip，並重啟服務器。
- 把整個專案複製一份到你的電腦裡，這裡指的「內容」不是只有檔案，而是指所有整個專案的歷史紀錄、分支、標籤等內容都會複製一份下來。
```sh
$ git clone
```
- 將 __.env.example__ 檔案重新命名成 __.env__，如果應用程式金鑰沒有被設定的話，你的使用者 sessions 和其他加密的資料都是不安全的！
- 當你的專案中已經有 composer.lock，可以直接執行指令以讓 Composer 安裝 composer.lock 中指定的套件及版本。
```sh
$ composer install
```
- 產生 Laravel 要使用的一組 32 字元長度的隨機字串 APP_KEY 並存在 .env 內。
```sh
$ php artisan key:generate
```
- 執行 __Artisan__ 指令的 __migrate__ 來執行所有未完成的遷移，並執行資料庫填充（如果要測試的話）。
```sh
$ php artisan migrate --seed
```
- 在瀏覽器中輸入已定義的路由 URL 來訪問，例如：http://127.0.0.1:8000。
- 你可以經由 `/admin/login` 來進行登入，預設的電子郵件和密碼分別為 __admin@admin.com__ 和 __password__ 。

----

## 畫面截圖
![](https://i.imgur.com/hYbwWyt.png)
> 使用評論來集中管理意見回饋

![](https://i.imgur.com/oduzIoi.png)
> 使用 @ 提及成員，將該成員帶入任務評論中的討論
