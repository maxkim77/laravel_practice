<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory; // 추후 테스트 데이터를 만들때 사용
   protected $table = 'posts';
    
}


/**
 * 라라벨 엘로퀀트 모델명, 테이블명 컨벤션 개요
 * 만약 모델 클래스 내에 테이블명을 따로 명시하지 않으면, 라라벨은 이 규칙을 따라 자동으로 테이블명을 결정합니다.
 * 라라벨 프레임워크가 자동으로 모델에 맞는 데이터베이스 테이블을 찾아서 처리할 수 있습니다.
 * 예시:
 * 모델명             테이블명
 * --------------------------------
 * User              users
 * Post              posts
 * Reply             replies
 * Flight            flights
 * BillingAccount    billing_accounts
 * FirewallRule      firewall_rules


 */

 /* 
 class BaseClass {
    public $public = 'Public';
    protected $protected = 'Protected';
    private $private = 'Private';

    function printHello() {
        echo $this->public;
        echo $this->protected;
        echo $this->private;
    }
}

class DerivedClass extends BaseClass {
    // 상속받은 메서드가 접근
    function printHello() {
        echo $this->public;    // 접근 가능 외부에서 객체의 인스턴스를 통해서도 접근가능
        echo $this->protected; // 접근 가능 상속받은 클래스에서만 사용가능 
        echo $this->private;   // 접근 불가능, 오류 발생 해당 클래스에서만 사용가능
    }
}

$obj = new BaseClass();
echo $obj->public;   // 작동함
echo $obj->protected; // 오류 발생, 접근 불가능
echo $obj->private;   // 오류 발생, 접근 불가능

 
 */