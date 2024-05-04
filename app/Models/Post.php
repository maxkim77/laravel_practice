<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   use HasFactory;
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
