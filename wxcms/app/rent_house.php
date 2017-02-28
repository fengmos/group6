<<<<<<< HEAD
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent_house extends Model
{
    //

    protected $table = 'rent_house';

    //禁止时间
    public $timestamps = false;

    //获取所有
    public function sel(){

        return $this->all();

    }

}
=======
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rent_house extends Model
{
    //

    protected $table = 'rent_house';

    //禁止时间
    public $timestamps = false;

    //获取所有
    public function sel(){

        return $this->all();

    }

}
>>>>>>> f5f5bdaa9672a93165592998e6dc949d2eb8f836
