# Laravel Study Repository

이 레포지토리는 프레임워크를 학습하고, 학습한 내용과 실습 코드를 기록하기 위한 공간입니다.

## 목차

- [Laravel Study Repository](#laravel-study-repository)
  - [목차](#목차)
  - [프로젝트 시작하기](#프로젝트-시작하기)
    - [아티즌(Artisan)](#아티즌artisan)
    - [환경설정](#환경설정)
    - [설정](#설정)
  - [아키텍처](#아키텍처)
    - [MVC(Model, View, Controller)](#mvcmodel-view-controller)
      - [모델](#모델)
      - [뷰](#뷰)
      - [컨트롤러](#컨트롤러)
  - [프로젝트 개요 및 준비](#프로젝트-개요-및-준비)
  - [인증](#인증)
  - [커뮤니티](#커뮤니티)
  - [레벨업](#레벨업)
  - [RESTful API](#restful-api)
  - [배포](#배포)

## 프로젝트 시작하기

> Laravel 프로젝트를 시작하는 방법과 프레임워크의 기초에 대해 학습합니다.

Laravel 프로젝트는 다음과 같은 명령어로 생성합니다.
```bash
composer create-project laravel/laravel {프로젝트명}
```
다른 방법으로도 가능합니다.
```bash
laravel new {프로젝트명}
```

### 아티즌(Artisan)
아티즌(Artisan)은 라라벨 프레임워크를 사용할 때 개발자에게 각종 도움을 주기 위한 명령어 집합입니다. `php artisan serve`처럼 사용한 것이 아닌 아티즌으로 명령을 수행한 것입니다. 명령어를 모두 나열하지는 않겠지만, 라라벨을 사용할수록 자연스럽게 자주 쓰게 됩니다. `php artisan serve` 이외에도 컨트롤러(Controller)와 모델(Model)을 생성하거나 데이터베이스 마이그레이션(Migration)을 실행하는 명령어가 있으며 단순하고 귀찮지만 중요한 작업들을 처리할 수 있습니다. 어떤 아티즌 명령어가 있는지는 `php artisan list` 명령어를 사용하면 살펴볼 수 있습니다.
대략적인 명령어를 알고는 있지만 사용법이나 어떤 옵션이 있는지 까먹었을 수도 있습니다. 그럴 때는 `php artisan help`를 사용해봅시다! 예를 들어 `serve` 명령어의 사용법이 궁금하다면 다음과 같이 입력합니다.
```bash
php artisan help serve
```

### 환경설정
라라벨의 환경변수는 `.env` 파일에서 관리됩니다. 이 파일에는 데이터베이스 설정이나 캐시 및 세션 드라이버 설정 등 어플리케이션이 구동되는 환경에 대한 설정이 담겨있습니다. `APP_KEY`, `데이터베이스 비밀번호` 등 외부에 노출되면 위험한 정보가 담겨있기 때문에 일반적으로 Git과 같은 VCS(Version Control System)에 푸시(Push)하지 않습니다. 일정 부분 공유가 필요하다면 키는 놔두되 값은 비우고, `env.example`로 이름을 바꿔서 푸쉬하면 됩니다.
환경설정은 `이름=값` 형태로 구성되며 전역변수인 `$_ENV` 변수에 할당됩니다. `APP_KEY` 같은 경우 `php artisan key:generate`로 설정된 값이며 `APP_DEBUG`의 경우 `true`로 놓을 경우 어플리케이션의 정보가 노출되기 때문에 프로덕트 환경에서는 활성화해서는 안 됩니다.
```bash
APP_ENV=local
APP_KEY=base64:9mmLYDPH/geWy3zi53TtPBpgwk0/ZoaTrJFgkjvh08Y=
APP_DEBUG=true
```
어플리케이션 내부에서는 `env()`로 설정값에 접근할 수 있는데, config 디렉터리 아래에 있는 설정 파일을 제외한 컨트롤러 등 나머지 부분에서 `env()`로 직접 환경설정에 접근하는 것은 권장되지 않습니다. `config/app.php`는 어플리케이션의 일반적인 설정값을 가지고 있으며 `env()`를 통해 환경변수 값에 접근하는 모습을 볼 수 있습니다. `env()`의 두 번째 값은 환경변수가 설정되지 않았을 경우의 기본값을 지정합니다.
```bash
'env' => env('APP_ENV', 'production')
```

### 설정
라라벨은 config 디렉터리에 있는 설정 파일에서 정의된 값에 따라 어플리케이션에서 사용하는 기능의 설정이 정의됩니다. 캐시와 데이터베이스에 해당하는 `cache.php`, `database.php` 등 여러 설정 파일이 있는 것을 볼 수 있는데, 이 파일들은 라라벨의 내부 기능들을 살펴볼 때 자주 보게 될 예정이므로 지금 당장 살펴보는 것은 낭비입니다. 따라서 이 시점에 파일을 열어볼 필요는 없습니다.
`config()`를 사용하면 `env()`가 아닌 `config()`를 통해 얻어 오는 것이 바람직한 방법입니다. 아래의 표현은 `config/app.php`에서 `env`로 설정된 값을 가져오는 코드입니다.
```bash
config('app.env'); // local
```


## 아키텍처

> 라라벨 프레임워크를 구성하는 뼈대를 학습합니다.

### MVC(Model, View, Controller)
서비스 컨테이너와 서비스 프로바이더 등을 알아보기 이전에 알아야 하는 사항은 바로 `MVC(Model, View, Controller)`입니다. 라라벨은 기본적으로 사용자에게 무엇을 보여줄 것인지 그리고 어플리케이션이 다루는 데이터가 무엇인지를 표현하는 모델(Model)과, 이 모델을 사용자에게 어떤 유저 인터페이스를 통해 보여줄 것인지를 나타내는 뷰(View), 마지막으로 모델에서 데이터를 얻어 오고 뷰에 데이터를 전달하며 소통하는 컨트롤러(Controller)로 구성되어 있습니다. 현재는 라라벨 프레임워크와 MVC를 이해하기 위한 기본적인 사항만 이해하기로 하고 자세한 내용은 이후에 알아보게 될 겁니다.

#### 모델
모델(Model)은 사용자에게 보여줄 데이터를 의미합니다. 이러한 데이터는 일반적으로 MySQL, Oracle과 같은 DBMS(Database Management System)에 관리되는 데이터베이스에 담겨있습니다. 라라벨 프레임워크 내부에서는 데이터베이스 테이블에 대해 하나의 클래스로 표현하고 각 칼럼 또한 프로퍼티로 매핑되어 있습니다. 모델에 있는 프로퍼티를 조작하고, 데이터베이스와 관련된 메서드를 호출하여 데이터를 동기화하는 것으로 데이터베이스의 내용이 변하게 되는 마법을 부릴 수 있습니다. `App\Models\User`는 `users` 테이블에 대응하는 `User 모델`이라 부릅니다.
```php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;
}
```

`User 모델`은 라라벨의 관례에 따라 `users` 테이블에 연결됩니다. 라라벨은 사용자가 직접 설정을 하는 것보다는 암묵적으로 서로 약속한 관례에 따라 설정이 되는 것을 지향하고 있기 때문에 모델의 이름만 보더라도 이 모델이 어떤 테이블과 연결되는지를 알 수 있습니다.
객체지향 관점에서 보자면 `User 모델`은 인증과 관련이 있어서 `User(as Authenticatable)` 클래스를 상속하고 있지만, 일반적인 모델은 `Illuminate\Database\Eloquent\Model` 클래스를 상속받습니다. `Authenticatable`를 살펴보면 알 수 있습니다.
```php
namespace Illuminate\Foundation\Auth;

use Illuminate\Database\Eloquent\Model;

class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract
{
  use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;
}
```

`Model`은 모델을 위한 여러 프로퍼티를 가지고 있습니다. 그 예로 `Model::$table`은 관례쩍으로 연결되는 테이블의 이름을 변경할 수 있게 해줍니다. 이를테면 `User 모델`의 테이블의 이름을 `users`가 아니라 다른 것으로 바꿀 수 있습니다. 그 외에도 많은 프로퍼티가 존재하는데, 여기서 이야기하지 않는 내용들은 공식문서를 살펴봅시다.
앞으로 우리가 생성할 모델들도 데이터베이스에 있는 테이블과 연결되어 있을 것입니다. 라라벨에서는 한 가지 놀라운 기능을 제공하는데, 엘로퀀트(Eloquent)라는 이름을 가진 ORM(Object Relational Mapping)을 하드코드하지 않더라도 간단하게 데이터베이스 테이블에 접근하여 내용을 추가하거나 수정하고 조회할 수 있게 됩니다. 데이터 바인딩과 같은 부분은 라라벨이 알아서 처리해줍니다. 라라벨에서 모델과 엘로퀀트 ORM을 사용하면 코드가 얼마나 간단한지 미리 살펴봅시다.
```php
$pdo = new PDO(...);

$sth = $pdo->prepare("SELECT * FROM users");

if ($sth->execute()) {
  $users = [];

  while ($user = $sth->fetchObject()) {
    array_push($users, $user);
  }
}
```

라라벨을 사용하지 않고, PHP 내장 클래스 중 하나인 PDO(PHP Data Object) 레이어를 통해 쿼리를 준비(Prepared Statement)한 다음, 실행하고 결과를 하나씩 가져와 배열에 넣습니다. 쿼리를 준비하는 과정에는 SQL Injection 공격 방지를 위한 문자열 처리도 포함됩니다. PDO는 PHP에서 데이터베이스의 종류에 상관없이 동일한 인터페이스로 데이터베이스를 조작할 수 있는 레이어(Layer)이며 모던 PHP에서 데이터베이스에 연결하기 위한 기본개념 중 하나입니다. 하지만 엘로퀀트 ORM을 사용하여 조회하면 아래와 같이 간결하게 처리될 수 있습니다.
```php
$users = User::all();
```

`User 모델`에서 `all()` 메서드를 마치 정적 메서드를 호출하는 것처럼 사용한 것을 볼 수 있는데, PHP의 언어 기능 중 하나인 [매직 메서드](https://www.php.net/manual/en/language.oop5.magic.php)에서 `__callStatic()`을 살펴보면 아이디어를 얻어볼 수 있습니다.

#### 뷰
뷰(View)는 사용자 인터페이스(UI, User Interface)를 통해 HTTP 요청을 다른 로직에 전달하거나, 컨트롤러에서 반환되어 사용자에게 응답합니다. 응답으로 반환된 뷰는 렌더링되어서 사용자에게 보일 것입니다. 라라벨에서는 블레이드(Blade)라는 전용 템플릿을 사용합니다. 만약 Mustache, Twig 등의 다른 템플릿을 사용해본 경험이 있다면 어렵지 않게 익힐 수 있습니다.
블레이드 템플릿이 가지는 주요 기능 중 하나는 레이아웃 템플릿을 상속하거나 컴포넌트와 슬롯 등의 개념을 사용하여 마크업을 구성할 수 있다는 점입니다. `resources/views/welcome.blade.php` 파일을 열어보면 마크업이 있는 모습을 볼 수 있는데, 이것이 블레이드 템플릿입니다. 여기에서는 일반적인 for, foreach 등의 일반적인 php 문법이 아닌 `@for`, `@foreach`와 같은 @가 포함된 지시어(Directive)를 사용합니다. `resources/views/welcome.blade.php`에 있는 파일의 일부를 보면 다음과 같이 코드가 있는 모습을 볼 수 있습니다.
```php
@if (Route::has('login'))
  <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
    @auth
      <a href="{{ url('/home') }}" class="font-semibold text-gray-600 focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
    @else
      <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>
      @if (Route::has('register'))
        <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
          @endif
        @endauth
  </div>
@endif
```

login에 해당하는 라우트가 존재하는 경우(@if)에 대해 사용자 인증(@auth)이 된 경우 /home에 해당하는 링크를, 인증이 되지 않은 경우(@else)에는 login이라는 이름을 가진 라우트의 링크를 생성합니다. 그리고 register라는 라우트가 있는 경우 마찬가지로 그에 해당하는 링크를 생성합니다.
라라벨의 뷰에 해당하는 블레이드 템플릿은 앞서 말한 상속, 컴포넌트, 슬롯을 포함한 기본적인 제어 구문과 반복문 그리고 기존의 PHP에는 없는 디렉티브 및 인증과 관련된 기능을 포함하고 있으므로 [공식문서](https://laravel.com/docs/10.x/blade)를 통해서도 알아볼 수 있습니다. 자세한 내용은 프로젝트를 진행하면서 이후 블레이드 템플릿을 살펴볼 때 알아봅시다.

#### 컨트롤러
컨트롤러(Controller)에는 어플리케이션의 주요 로직이 담겨있습니다. 컨트롤러가 아닌 레이어드 아키텍처(Layered Architecture)에 따라 서비스 레이어(Service Layer)에 비즈니스 로직을 두는 경우가 더 많기는 하지만, 계층을 나누지 않는다면 컨트롤러에서 처리하게 됩니다. 컨트롤러는 사용자가 요청하면 라우터와 미들웨어를 거쳐 도달하게 되는데, 주로 모델을 생성하거나 갱신하게 되고 이후 뷰를 응답으로 반환하거나, 다른 페이지로 리다이렉트, XML, JSON 등의 포맷으로 변환된 데이터를 반환하게 됩니다. 일반적인 웹 서비스를 만들 때는 뷰에 데이터를 전달하여 응답하거나 다른 페이지로 리다이렉트하며, API 서버를 만든다면 JSON과 같은 포맷으로 응답하는 것이 일반적입니다.

사용자가 HTTP 요청을 하고 라우터를 통해 컨트롤러에 도달하는 과정을 잠시 알아봅시다. 라라벨은 프론트 컨트롤러(Front Controller)를 사용하여 사용자의 모든 요청을 `public/index.php`로 먼저 모으게 됩니다. 여기에서는 어플리케이션을 부트스트래핑(Bootstrapping)하고 PSR-4 Autoloader Standard에 따라 오토로더를 초기화한 뒤, 사용자의 요청을 주소에 맞게 각 컨트롤러로 전달하게 됩니다.

사용자의 요청을 가장 먼저 맞이하는 프론트 컨트롤러인 `public/index.php`를 살펴볼 필요가 있습니다. `LARAVEL_START` 상수는 어플리케이션이 시작된 시각을, `$maintenance`는 점검모드 일 때를 이야기하는데, 그렇게 중요하지는 않습니다.

```php
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

if (file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
  require $maintenance;
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = $kernel->handle(
  $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
```

주요하게 살펴보아야 할 부분은 오토로딩과 메인 어플리케이션을 생성하고 커널을 생성하는 일입니다.

```bash
require __DIR__.'/../vendor/autoload.php';
```

PSR-4 Autoloader에 따라 오토로더를 설정하는 코드입니다. 어플리케이션에서 사용하는 외부 패키지에 대한 의존성을 등록해주며, 이를 포함한 이후부터는 include, require 등의 PHP 언어 구조를 사용하지 않더라도 use를 통해 class, interface, trait를 불러올 수 있습니다.

```php
use Illuminate\Contracts\Http\Kernel;

$app = require_once __DIR__.'/..bootstrap/app.php';

$kernel = $app->make(Kernel::class);

$response = tap($kernel->handle(
  $request = Request::capture()
))->send();

$kernel->terminate($request, $response);
```

`bootstrap/app.php`에서는 어플리케이션을 부트스트래핑하고 서비스 컨테이너(Service Container)인 `Illuminate\Foundation\Application` 객체를 얻어 옵니다.

```php
$app = new Illuminate\Foundation\Application(
  $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);
```

이후 컨테이너를 통해 `Illuminate\Contracts\Http\Kernel`을 따르는 구체 클래스를 생성합니다. 커널(Kernel)은 사용자의 요청을 라우터와 미들웨어로 전달하고 중간에 예외가 발생하면 처리합니다. 그 일은 `Kernel::handle()`이 담당합니다. 이러한 커널에는 웹 요청을 처리하는 HTTP Kernel과 아티즌 명령어 등 명령줄 요청에 대한 커널인 Console Kernel이 있습니다. 이후 라우터를 거쳐 컨트롤러로 전달하고 응답을 얻습니다. 여기서 얻은 응답은 커널의 terminate() 메서드에서 마무리됩니다.

프론트 컨트롤러의 커널단을 거치면 라우터로 도달하게 됩니다. 라우팅(Routing)의 가장 기본적인 코드를 살펴봅시다. `routes/web.php` 파일을 살펴보면 다음과 같은 코드가 있습니다.

```php
Route::get('/', function () {
  return view('welcome');
})
```

라우터에 컨트롤러를 클로저 형태로 등록했습니다. 이 코드는 사용자가 요청하면 URL을 파싱하고 등록된 클로저를 실행하라는 의미를 담고 있습니다. 다시 말하면 사용자가 `GET /` 요청을 하면 컨트롤러가 welcome에 해당하는 뷰인 `resources/views/welcome.blade.php`를 반환하여 클라이언트에 응답합니다. 이 코드가 있어서 우리는 서버를 실행하고 / 경로로 접속했을 때 그에 해당하는 뷰를 볼 수 있었던 것입니다.

컨트롤러는 클로저가 아닌 별도의 컨트롤러 클래스로 등록하는 것이 일반적이며 리소스 라우트 등 라라벨에서 지원하는 라우트 세팅도 존재합니다. 간단하게 welcome 뷰를 반환하는 컨트롤러를 클래스 형태로 만들고 등록해봅시다. 먼저 컨트롤러를 생성하는 명령어를 입력해봅시다.

```bash
php artisan make:controller WelcomeController --invokable
```

`php artisan make:controller` 명령어를 사용하면 클래스 형태의 컨트롤러를 만들 수 있습니다. `--invokable`은 단일 액션 컨트롤러를 의미합니다. 일반적으로 컨트롤러 클래스에는 다수의 메서드가 정의되는데, 만약 컨트롤러 클래스가 하는 일이 명백하게 한 가지밖에 없을 경우 단일 액션 컨트롤러로 만들 수도 있습니다. 만들어진 컨트롤러는 `App\Http\Controllers\WelcomeController`이며 생성된 코드에 welcome 뷰를 반환하는 코드를 추가하는 예제입니다.

```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('welcome');
    }
}
```

`WelcomeController`를 생성했다면, 이제 `routes/web.php`에 `GET /`로 등록된 라우트를 변경하면 기존의 코드와 똑같이 동작하게 될 것입니다. 이렇게 하면 컨트롤러 클래스를 라우터에 등록하는 것입니다.

```php
Route::get('/', \App\Http\Controllers\WelcomeController::class);
```

라우터를 거쳐 컨트롤러로 사용자의 요청을 전달하기 전에 미들웨어(Middleware)라는 계층을 하나 더 통과하게 되는데, 이러한 미들웨어에서는 세션을 활성화하거나 CSRF 토큰을 확인하고 인증된 사용자인지 확인하는 등의 일을 할 수 있습니다.

미들웨어는 전역적인 요청에 대해 처리하는 글로벌 미들웨어와 개별 라우트에 설정할 수 있는 라우트 미들웨어, 그리고 미들웨어들을 그룹화한 그룹 미들웨어가 있습니다. 이러한 미들웨어들이 기본적으로 어떤 것들인지는 `app\Http\Kernel.php`에서 확인할 수 있는데, 프로젝트를 진행하면서 다양한 미들웨어를 사용하게 될 것이므로 바로 넘어가도록 합시다.



## 프로젝트 개요 및 준비

> 

## 인증

> 

## 커뮤니티

> 

## 레벨업

> 

## RESTful API

> RESTful API를 개발하고 인증 기능을 구현하는 방법을 학습합니다.

## 배포

> Laravel 애플리케이션을 배포하는 방법을 학습합니다.

---

이 레포지토리는 학습한 Laravel 내용을 지속적으로 업데이트할 예정입니다. 기여하거나 질문이 있으시면 언제든지 연락 주세요

위 내용을 레포지토리의 README.md 파일로 작성하시면 됩니다. 이 파일을 기반으로 하여 Laravel 학습을 진행하고 레포지토리를 업데이트하시면 됩니다. 가장 기초적인 목차를 통해 각 주제별 학습을 쉽게 시작할 수 있습니다.
