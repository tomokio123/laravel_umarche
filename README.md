## インストール後の実施事項
- 画像のダミーデータは public/imagesフォルダ内に sample1.jpg 〜 sample6.jpg として保存

`php artisan storage:link `で storageフォルダにリンク後、

storage/app/public/productsフォルダ内に保存すると表示される。 (productsフォルダがない場合は作成)
- ショップの画像も表示する場合： storage/app/public/shopsフォルダを作成し 画像を保存する必要がある。