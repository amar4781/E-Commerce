<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    use Translatable;
    protected $with = ['translations'];
    protected $guarded = [];
    protected $translatedAttributes = ['value'];
    protected $casts = ['is_translatable' => 'boolean'];
    public static function setMany($settings)
    {
        foreach ($settings as $key => $value){
            self::set($key,$value);
        }
    }

    public static function set($key,$value)
    {
        if ($key === 'translatable'){
            return static::setTranslatableSettings($value);
        }

        if (is_array($value)){
            $value = json_encode($value);
        }

        static::updateOrCreate(['key' => $key],['plain_value' => $value]);
    }

    public static function setTranslatableSettings($settings = [])
    {
        foreach ($settings as $key => $value){
            static::updateOrCreate(['key' => $key],[
                'is_translatable' => true,
                'value'=>$value,
            ]);
        }
    }
}
