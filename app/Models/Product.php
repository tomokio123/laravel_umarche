<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shop;
use App\Models\SecondaryCategory;
use App\Models\Image;
use App\Models\User;
use App\Models\Stock;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'shop_id',
        'name',
        'information',
        'price',
        'is_selling',
        'sort_order',
        'secondary_category_id',
        'image1',
        'image2',
        'image3',
        'image4',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category()
    {
        return $this->belongsTo(SecondaryCategory::class, 'secondary_category_id');
    }

    //$image1という商品Modelのプロパティを、リレーションでは「imageFirst()」と呼ぶことにする。
    public function imageFirst()
    {
        return $this->belongsTo(Image::class, 'image1', 'id');
    }
    public function imageSecond()
    {
        return $this->belongsTo(Image::class, 'image2', 'id');
    }
    public function imageThird()
    {
        return $this->belongsTo(Image::class, 'image3', 'id');
    }
    public function imageFourth()
    {
        return $this->belongsTo(Image::class, 'image4', 'id');
    }
    
    //１つの商品に対して「たくさんの在庫」を持つ
    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    //
    public function users()
    {
        //多対多(Product<=>User)の関係を定義。belongsToManyをProduct/Userの両方に書く
        return $this->belongsToMany(User::class, 'carts')//中間テーブル="carts"とする
        ->withPivot(['id', 'quantity']);//多対多実現のために中間テーブル(Pivot)を紐づける
    }
}
