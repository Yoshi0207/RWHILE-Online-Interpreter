# RWHILE-Online-Interpreter
R-WHILEのオンラインインタプリタ  
phpのライブラリLaravelを使用している

## Requirements
+ php
+ composer
+ OCaml
+ ocamlfind
+ ocamlyacc
+ extlib
+ The BNF Converter: http://bnfc.digitalgrammars.com/

## Linux Ubuntu にてインストール例
```
git clone 
sudo apt update
```

+ composerをインストール(Laravelに必要)
```
curl -sS https://getcomposer.org/installer | php
cd RWHILE-Online-Interpreter
./composer.phar install
```

+ OCamlをインストール
```
sudo apt install opam
opam init
opam update
opam switch
opam install extlib ocamlfind
```

+ .env.sampleの名前を.envに変更しそのファイル内の
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```
を各環境のデータベースの設定に合わせて書き換える

（例）sqlite3の場合  
.env
```
DB_CONNECTION=sqlite
```
に変更し上記以外の項目は削除する

```
touch database/database.sqlite
php artisan migrate
```

+ ディレクトリsrcに移動しコンパイルする
```
cd src
make
```

+ ディレクトリwebの中に data, programs を書き込みできるようにする．
```
mkdir data programs
chmod 777 data
chmod 777 programs
```

+ アプリケーションキー？を設定
```
php artisan key:generate
php artisan config:clear
```

+ 以下のコマンドでローカルサーバを起動できる
```
php artisan serve
```

## 注意点
+ 新しいバージョンのOCamlを使用する場合は，Makefile中の
```
OCAMLC=ocamlfind ocamlc -g -package extlib -linkpkg
```
を
```
OCAMLC=ocamlfind ocamlc -unsafe-string -g -package extlib -linkpkg
```
に変更する必要がある

+ ./composer.phar installでエラーが出た場合は以下のコマンドで解決する可能性がある
```
sudo apt-get install php-gd php-xml php7.4-mbstring
```

