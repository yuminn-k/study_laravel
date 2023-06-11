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
    - [컨테이너](#컨테이너)
      - [의존성 주입](#의존성-주입)
      - [서비스 컨테이너](#서비스-컨테이너)
      - [서비스 프로바이더](#서비스-프로바이더)
      - [부트스트래핑](#부트스트래핑)
      - [지연된 서비스 프로바이더](#지연된-서비스-프로바이더)
    - [파사드](#파사드)
      - [실시간 파사드](#실시간-파사드)
    - [헬퍼함수](#헬퍼함수)
    - [Laravel Contracts](#laravel-contracts)
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

### 컨테이너

라라벨의 서비스 컨테이너(Service Container)는 IoC(Inversion of Control) 컨테이너, 어플리케이션 컨테이너 등 여러 이름을 가지고 있습니다. 컨테이너에 대해 알아보려면 먼저 의존성 주입(DI, Dependency Injection)에 대한 이해가 선행되어야 합니다.

#### 의존성 주입

의존성 주입은 사실 그다지 특별한 개념이 아니라 생성자, 메서드, 세터(Setter)에 파라미터를 통해 외부에서 구체 클래스(Concrete Class) 또는 인터페이스(Interface)를 충족하는 객체를 넣는 것입니다. 의존성(Dependency)이란 어떤 기능이 제대로 동작하기 위해서는 다른 기능에 의존하는 것이 필요함을 말하는데, 의존성을 외부에서 주입하지 않고 비즈니스 로직 내부에서 객체를 직접 생성하면 클래스 간 결합도가 크게 증가하여 유연성이 떨어지게 됩니다. 아래는 의존성 주입의 기본적인 예입니다.

```php
class Foo
{
  public function __construct(
    public readonly string $message
  ){}
}
class Bar {}
class Baz
{
  public function __construct(Foo $foo, Bar $bar) {}
}

$foo = new Foo('Hello, world');
$bar = new Bar();

new Baz($foo, $bar);
```

Baz는 구체 클래스인 Foo, Bar의 객체를 의존성으로 가지는데, 이 두 객체를 생성해서 Baz를 생성할 때 주입(Injection)시킨 것을 볼 수 있습니다. Baz는 Foo, Bar 이외에 대른 객체를 받을 수 없어서 유연하지 않습니다. 의존성 주입을 사용하면 내부에서 구체 클래스를 생성하는 일은 거의 사라지는데, 결합도를 느슨하게 하기 위해 구체 클래스보다는 인터페이스를 사용하는 경우가 많습니다.

```php

interface Qux {}
class Quux implements Qux {}
class Quuz implements Qux {}
class Corge
{
  public function __construct(Qux $qux) {}
}

$quux = new Quux();
new Corge($quux);
$quuz = new Quuz();
new Corge($quuz);
```

Corge는 Qux를 충족하는 클래스의 객체라면 전부 받을 수 있는데, 이 이야기는 구체 클래스가 아닌 인터페이스 타입으로 한다면 인터페이스를 만족하는 그 어떤 구체 클래스도 넣을 수 있다는 말이 됩니다. 이는 클래스가 전반적으로 유연하지는 장점이 있습니다. 라라벨에서는 구체 클래스보다는 인터페이스를 통한 의존성 주입이 많은데, 이후 Laravel Contracts에서 알아봅시다.

#### 서비스 컨테이너

라라벨의 서비스 컨테이너는 IoC 컨테이너로서 의존성을 외부에서 주입해서 해결(Resolve)해줍니다. IoC는 비즈니스 로직에서 의존성을 직접 제어(new로 직접 생성)하지 않고 컨테이너에 의해 외부로부터 주입하는 것으로 제어의 주체를 로직이 아닌 외부의 영역에서 하도록 만드는 것입니다. 따라서 컨테이너는 객체의 생성 방법을 알고 있으며, 이를 대신해주고 필요한 곳에 주입해줍니다.
비즈니스 로직에서 어떠한 객체를 컨테이너에 요구하면 객체를 적절하게 생성해서 넘겨주게 되는데, 이를 의존성 해결이라 합니다. 라라벨에서 기본적으로 해결해주는 것도 있고 의존성 해결을 위해 바인딩을 거쳐야 하는 일도 있습니다.
라라벨에서는 컨테이너를 통해 이를 명시적으로 객체를 생성해서 주입하지 않고도 서비스 컨테이너가 컨트롤러 등에서 타입힌드(Type Hint)만 해주면 자동으로 의존성이 해결됩니다. 이를 오토 와이어링(Auto Wiring) 기능이라고 합니다. 다시 WelcomeController를 살펴보면 라라벨의 요청 래핑인 Illuminate\Http\Request를 주입 받고 있는 것을 볼 수 있습니다.

```php
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
  public function __invoke(Request $request)
  {
    return view('welcome');
  }
}
```

단지 Request를 타입힌트만 했을 뿐인데도 올바르게 동작합니다. 이는 서비스 컨테이너에 Request가 필요하니 달라고 요구하는 것입니다. 우리는 Request를 만들 때 어떻게 해야 하는지 모르고 굳이 알 필요도 없습니다. 그저 생성의 책임은 서비스 컨테이너에 던져버린 뒤 요구만 했을 뿐입니다. 이것이 라라벨 서비스 컨테이너로 의존성을 주입받는 방법입니다.
`app()`, 또는 `resolve()`라는 헬퍼함수(Helper Functions)를 통해서도 의존성을 해결할 수 있습니다. 파라미터로 Request를 받는 대신, 헬퍼를 사용해서 만들어봅시다. 라라벨에는 이러한 헬퍼가 많이 존재합니다. 그리고 이후에 더욱 많이 나올 것입니다. 컨트롤러에서 뷰를 반환할 때 사용한 `view()` 함수도 헬퍼함수입니다.

```php
use Illuminate\Http\Request;

public function __invoke()
{
  // $request = app(Request::class);
  $request = app()->make(Request::class);

  return get_class($request); // Illuminate\Http\Request
}
```

`app()`을 사용하면 의존성을 해결할 수 있습니다. 또한 `app()->make()`를 사용해도 의존성을 해결하고 객체를 생성할 수 있습니다. 이 방법은 구체 클래스보다는 인터페이스를 통한 의존성 해결에 조금 더 많이 사용됩니다. new 키워드를 사용해서 생성한 것과 큰 차이를 느끼지 못할지도 모르겠지만, 라라벨에서는 `app()`을 사용해서 서비스 컨테이너에 객체의 생성을 위임하는 것이 조금 더 나은 방법입니다. `resolve()`로도 의존성을 해결할 수 있지만, 단순히 `app()`을 반환하므로 큰 차이는 없습니다.

```php
if (! function_exists('resolve')) {
  function resolve($name, array $parameters = [])
  {
    return app($name, $parameters);
  }
}
```

만약 컨테이너가 객체를 생성하는 방법을 모른다면 어떻게 해야 할까요? 그리고 인터페이스를 타입힌트했는데 구체 클래스를 원한다면 어떻게 해야 할까요? 프론트 컨트롤러에도 인터페이스를 요구했으나 구체 클래스를 반환하는 모습을 볼 수 있었습니다.

```php
use Illuminate\Contracts\Http\Kernel;

$kernel = $app->make(Kernel::class);
```

이를 해결하려면 의존성을 해결하는 방법을 컨테이너에 알려주어야 합니다. 그 예를 살펴봅시다.
프론트 컨트롤러에서 부트스트래핑을 위해 `bootstrap/app.php`를 포함하는 것을 볼 수 있었는데, 일부를 살펴봅시다.

```php
$app->singleton(
  Illuminate\Contracts\Http\Kernel::class,
  App\Http\Kernel::class
);

$app->singleton(
  Illuminate\Contracts\Console\Kernel::class,
  App\Console\Kernel::class
);

$app->singleton(
  Illuminate\Contracts\Debug\ExceptionHandler::class,
  App\Exceptions\Handler::class
);
```

서비스 컨테이너에 인터페이스가 타입힌트되면 구체 클래스로 어떤 것을 사용할지를 알려줍니다. 예를 들어 `Illuminate\Contracts\Http\Kernel`를 타입힌트하면 `App\Http\Kernel`을 생성하여 넘기라고 이야기합니다. 여기서 `Illuminate\Contracts\Http\Kernel`은 인터페이스입니다. `Illuminate\Contracts`에는 라라벨의 코어 서비스들을 정의한 인터페이스가 담겨있습니다. 인터페이스를 의존성 해결에 사용할 수 있다는 점은 강력한 기능이며 로직의 결합도를 느슨하게 하는 것에 크게 기여합니다.
서비스 컨테이너에 있는 `Illuminate\Foundation\Applications::singleton()`과 같은 메서드들로 의존성을 해결하기 위한 방법을 컨테이너에 알려줍니다. 일반적으로 서비스 컨테이너에 의존성 해결 방법과 객체 생성 방법을 알려주는 일은 어디서 할까요? 그건 보통 서비스 프로바이더(Service Provider)에서 합니다. 서비스 프로바이더는 라라벨 어플리케이션에서 사용할 외부 패키지나 기능을 제공하기 위해 사용합니다. 서비스 프로바이더는 추후에 알아보도록 하고, 지금은 의존성을 해결하는 방법을 살펴봅시다.
`App\Providers\AppServiceProvider::register()`에서 의존성을 해결해봅시다. 의존성을 컨테이너가 스스로 해결할 수 없는 상황에서는 `new` 키워드로 직접 객체를 생성하는 방법을 알려주어야 합니다. Baz는 컨테이너가 해결할 수 없는 생성자 파라미터를 요구하고 있으므로 컨테이너에서 Foo를 생성하여 Baz의 의존성을 해결하는 방법을 알려줄 필요가 있습니다.

```php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Foo;
use App\Bar;
use App\Baz;

class AppServiceProvider extends ServiceProvider
{
  public function register()
  {
    $this->app->bind(Baz::class, function ($app) {
      $foo = new Foo('Hello, world');

      return new Baz($foo, $app->make(Bar::class));
    })
  }
}
```

Baz의 의존성을 해결하기 위해 `Application::bind()`에서 Foo 클래스는 직접 생성하고, 의존성 해결이 가능한 Bar 클래스에 대해서는 컨테이너의 `Application::make()`로 해결하는 모습을 볼 수 있습니다. Baz의 의존성을 처리해달라고 컨트롤러 등에서 요구하는 것은 클로저에 작성된 로직대로 처리하라는 의미입니다. 이렇게 하면 컨테이너가 자체적으로 해결하지 못하는 의존성을 컨테이너에 알려주고 의존성을 해결할 수 있게 됩니다.
`Application::bind()`는 가장 일반적인 의존성 해결법입니다. 클로저를 넘겨줌으로 컨테이너에 객체의 생성 방법을 알려주는 것입니다. `Application::singleton()`의 첫 번째 파라미터에 구체 클래스가 아닌 인터페이스를 넘겨준 모습도 볼 수 있는데, `Application::bind()`에서도 그렇게 사용할 수 있으며 인터페이스로 타입힌트를 하면 특정 구체 클래스를 넘기라는 의미가 됩니다.
`Application::when()`처럼 사용하여 특정 문맥에 따라 의존성을 해결하는 방법도 제공합니다. 인터페이스 Qux를 만족하는 객체를 WelcomeController에서 사용할 때는 Quux가 필요하다고 컨테이너에 알려봅시다.

```php
use App\Controllers\WelcomeController;
use App\Qux;
use App\Quux;
use App\Quuz;

public function register()
{
  $this->app->when(WelcomeController::class)
    ->needs(Qux::class)
    ->give(Quux::class);

  $this->app->bind(Qux::class, Quuz::class);
}
```

`Application::when()`도 사용했고, `Application::bind()`도 사용했습니다. 사실 `Application::bind()`는 사용할 필요는 없지만, 둘을 함께 사용하면 어떻게 될지 알아보기 위해 적었습니다. `Application::when()`만을 단독으로 사용한 상태로 `WelcomeController::__invoke()`의 의존성을 해결하려 들면 에러가 발생합니다. 주입이 되는 곳이 다르기 때문입니다.
WelcomeController의 생성자에서 처리하면 Quux가 주입이 되고, 메서드에서는 Quuz가 주입됩니다. 이 얘기는 결국 `Application::when()`에 컨트롤러를 지목하여 처리하면 기본적으로는 생성자에 주입된다는 이야기입니다.

```php
class WelcomeController extends Controller
{
  public function __construct(public readonly Qux $qux) {}

  public function __invoke(Qux $qux)
  {
    // Quux, Quuz
    return [get_class($this->qux), get_class($qux)];
  }
}
```

#### 서비스 프로바이더

서비스 프로바이더(Service Provider)는 라라벨 어플리케이션에 기능을 제공하기 위해 사용됩니다. 예를 들어 라우트, 이벤트, 브로드캐스팅, 인증 등이 해당됩니다. 어플리케이션을 시작하기 위한 부트스트래핑이 진행되면서 발생하는 중요한 과정 중 하나는 서비스 프로바이더를 등록하고 부팅시키는 일입니다. 컨테이너에서 의존성 해결을 위해 바인딩을 등록했던 곳이 서비스 프로바이더임을 다시 한번 생각해봅시다.
기본적으로 라라벨 프레임워크 템플릿이 가지고 있는 서비스 프로바이더들은 `app\Providers`에 존재하며 AppServiceProvider, RouteServiceProvider 등이 위치하고 있습니다. 라라벨 코어에 있는 기능들을 어플리케이션에 제공하기 위한 서비스 프로바이더들은 `config/app.php`의 app.providers에 명시되어 있습니다. [라라벨 디버그바](https://github.com/barryvdh/laravel-debugbar)와 같이 라라벨에 친화적인 라이브러리들을 보면 서비스 프로바이더를 제공하고 있는 경우가 있는데, 등록할 때 app.providers에 넣어주면 됩니다.

```php
return [
  'providers' => [
    Illuminate\Auth\AuthServiceProvider::class,
    Illuminate\Broadcasting\BroadcastServiceProvider::class,
    Illuminate\Bus\BusServiceProvider::class,

    App\Providers\AppServiceProvider::class,
    App\Providers\AuthServiceProvider::class,
    // App\Providers\BroadcastServiceProvider::class,
    App\Providers\EventServiceProvider::class,
    App\Providers\RouteServiceProvider::class,
  ],
];
```

컨테이너에서 의존성을 등록할 때 이야기했던 AppServiceProvider를 다시 한번 살펴봅시다. 서비스의 의존성을 바인딩하는 일은 서비스 프로바이더의 `ServiceProvider::register()`에서 처리하는 것이 일반적입니다. 바인딩 이외에 다른 일을 처리하는 것은 잘못된 결과가 나타날 수 있습니다. `ServiceProvider::boot()`는 다른 모든 서비스 프로바이더가 등록된 이후에 호출됩니다. 만약 의존성이 하나도 등록되어 있지 않다면 내용이 비어 있을 것입니다.

```php
class AppServiceProvider extends ServiceProvider
{
  public function register() {}
  public function boot() {}
}
```

의존성을 바인딩하는 일이 복잡하지 않다면, `Application::bind()`,`Application::singleton()` 메서드를 사용하지 않더라도 `ServiceProvider::$bindings`, `ServiceProvider::$singletons` 프로퍼티에 추가하면 의존성을 등록할 수 있도록 지원하고 있습니다.

```php
class AppServiceProvider extends ServiceProvider
{
  public $bindings = [
    ServiceProvider::class => DigitalOceanServerProvider::class,
  ];

  public $singletons = [
    DowntimeNotifier::class => PingdomDowntimeNotifier::class,
    ServerProvider::class => ServerToolsProvider::class,
  ];
}
```

#### 부트스트래핑

서비스 프로바이더가 등록되고 부팅되는 부트스트래핑 과정을 살펴보기 위해 라라벨의 코어 소스를 조금만 살펴봅시다. 코어를 살펴볼 때는 코드를 전부 파악하려 들 필요 없이 이게 무엇을 하려고 하는 건지 의도만 파악해도 됩니다.
결론부터 이야기하면, 서비스 프로바이더의 등록은 커널에서 `bootstrap/app.php`에서 생성하는 `Illuminate\Foundation\Application`을 통해 진행됩니다. 먼저, 프론트 컨트롤러에서 컨테이너를 통해 `$app->make(Kernel::class)`로 생성된 커널이 `Kernel::handle()` 메서드를 호출하고 있는 것을 볼 수 있습니다.

```php
$kernel = $app->make(kernel::class);

$response = $kernel->handle(
  $request = Request::capture()
)->send();
```

생성한 커널 인스턴스는 바인딩 등록에 따라 `App\Http\Kernel`로 나타나는데, 해당 커널은 `Illuminate\Foundation\Http\Kernel`을 상속합니다. `Kernel::handle()` 메서드의 구현과 함께 관련된 메서드를 보여줍니다. 일부 내용은 생략했습니다.

```php
namespace Illuminate\Foundation\Http;

class Kernel implements KernelContract
{
  protected $app;

  protected $bootstrappers = [
    \Illuminate\Foundation\Bootstrap\LoadEnvironmentVariables::class,
    \Illuminate\Foundation\Bootstrap\LoadConfiguration::class,
    \Illuminate\Foundation\Bootstrap\HandleExceptions::class,
    \Illuminate\Foundation\Bootstrap\RegisterFacades::class,
    \Illuminate\Foundation\Bootstrap\RegisterProviders::class,
    \Illuminate\Foundation\Bootstrap\BootProviders::class,
  ];

  public function handle($request)
  {
    $response = $this->sendRequestThroughRouter($request);

    return $response;
  }

  protected function sendRequestThroughRouter($request)
  {
    $this->bootstrap();
  }

  public function bootstrap()
  {
    if (! $this->app->hasBeenBootstrapped()) {
      $this->app->bootstrapWith($this->bootstrappers());
    }
  }
}
```

`Kernel::sendRequestThroughRouter()`에서 `$this->bootstrap()`을 호출, `Kernel::bootstrap()`에서 `Application::bootstrapWith()`를 호출하여 부트스트랩하는 모습을 볼 수 있습니다. 여기서 `Kernel::bootstrappers()`는 단순하게 `Kernel::$bootstrappers`를 반환합니다.
`Kernel::$bootstrappers`를 살펴보면 서비스 프로바이더를 등록하는 일뿐만 아니라, 환경설정을 불러오거나 설정하고, 파사드를 등록하는 일도 하고 있음을 알 수 있습니다. 부트스트랩 대상이 되는 클래스는 `Illuminate\Foundation\Bootstrap`에 있으며, 여기에 소속된 클래스들은 각 `bootstrap()` 메서드를 가지고 있어서 `Application::bootstrapWith()`에서 호출됩니다.

```php
namespace Illuminate\Foundation\Bootstrap;

use Illuminate\Contracts\Foundation\Application;

class RegisterProviders
{
  public function bootstrap(Application $app)
  {
    $app->registerConfiguredProviders();
  }
}
```

#### 지연된 서비스 프로바이더

지연된(Deferred) 서비스 프로바이더란 단순하게 서비스 프로바이더에 바인딩만을 등록하는 단순한 케이스의 경우, 의존성 해결을 위해 사용될 때까지 등록을 지연할 수 있는 프로바이더를 말합니다. 어플리케이션을 부트스트래핑할 때 모든 요청에 대해 서비스 프로바이더를 로드해 놓는 것이 아니라 해당 의존성 해결이 필요한 경우에만 서비스 프로바이더를 로드하고 등록하도록 할 수 있습니다.
서비스 프로바이더에 `Illuminate\Contracts\Support\DeferrableProvider`를 구현하는 것으로 서비스 프로바이더가 지연된 서비스 프로바이더임을 나타낼 수 있고, `DeferrableProvider::providers()`에는 바인딩을 등록한 인터페이스나 클래스의 이름 목록을 반환하면 됩니다.

```php
namespace App\Providers

use App\Services\Riak\Connection;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class RiakServiceProvider extends ServiceProvider implements DeferrableProvider
{
  public function register()
  {
    $this->app->singleton(Connection::class, function ($app) {
      return new Connection($app['config']['riak']);
    });
  }

  public function provides()
  {
    return [Connection::class];
  }
}
```

### 파사드

라라벨의 파사드(Facades) 기능은 세션과 큐와 같은 라라벨의 기능들을 사용하기 위해 거쳐야 하는 복잡한 절차를 간편하게 사용하게 할 수 있도록 정적 메서드의 형태로 제공하는 라라벨의 기능 중 하나입니다. 파사드가 어떤 것인지 살펴보려면 같은 효과를 내면서 표현은 다른 코드를 볼 필요가 있으므로 의존성 주입, 파사드, 헬퍼함수를 살펴봅시다.

```php
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\View;

class WelcomeController extends Controller
{
  public function __invoke(Factory $factory)
  {
    return view('welcome'); // Helper Functions
    return View::make('welcome'); // Facades
    return $factory->make('welcome'); // Dependency Injections
  }
}
```

3가지 사용 방법은 모두 같은 결과를 냅니다. `view()`, `View::make()` 기능은 같은 효과를 내면서 `View::make()`는 `Illuminate\View\Factory::make()`를 부릅니다. 즉, 파사드는 이름이 길고 기억하기 어려우며 사용하기에도 번거로운 구체 클래스 또는 인터페이스 대해 정적 프록시(Proxy) 역할을 하게 되는 것입니다.
파사드의 등록 과정은 잠깐 살펴보았듯이 부트스트래핑 과정인 `Illuminate\Foundation\Bootstrap\RegisterFacades`에서 진행되고 이후 `config/app.php`에 있는 aliases에 나열된 클래스들이 등록되는 과정이 발생합니다. aliases에는 클래스의 별칭이 붙는데, `Illuminate\Foundation\AliasLoader`를 사용하여 진행됩니다. 이렇게 하면 글로벌 네임스페이스에서 호출하는 `\View::make()`와 같은 접근도 동작하게 됩니다.

```php
return [
  'aliases' => [
    'View' => Illuminate\Support\Facades\View::class
  ]
];
```

이제 파사드가 어떻게 동작하는지 다시 한번 라라벨의 코어를 살펴봅시다. 먼저 View 파사드를 봅시다.

```php
namespace Illuminate\Support\Facades;

class View extends Facade
{
  protected static function getFacadeAccessor()
  {
    return 'view';
  }
}
```

라라벨에 등록된 파사드들은 `Facade::getFacadeAccessor()` 정적 메서드를 가지고 있으며 반환하는 값은 서비스 컨테이너에서 의존성을 해결하기 위한 이름입니다. 그 의미는 아래와 같은 접근이 허용된다는 것을 의미합니다.

```php
// Illuminate\Support\Facades\View::make('welcome');
app('view')->make('welcome');
```

파사드는 `Illuminate\Support\Facades\Facade`를 상속하며 매직 메서드인 `Facade::__callStatic()`을 통해 처리됩니다. `Facade::__callStatic()`이 호출되면, `Facade::getFacadeRoot()`에서 `static::getFacadeAccessor()`를 호출하여 이름을 얻어 오고 `Facade::resolveFacadeInstance()`에서 `static::$app[$name]`으로 의존성을 해결하는 모습을 볼 수 있습니다.

```php
namespace Illuminate\Support\Facades;

abstract class Facade
{
  public static function __callStatic($method, $args)
  {
    $instance = static::getFacadeRoot();

    if (! $instance) {
      throw new RuntimeException('A facade root has not been set.');
    }

    return $instance->$method(...$args);
  }

  public static function getFacadeRoot()
  {
    return static::resolveFacadeInstance(static::getFacadeAccessor());
  }

  protected static function resolveFacadeInstance($name)
  {
    if (static::$app) {
      return static::$app[$name];
    }
  }
}
```

파사드는 라라벨에서 정말 많이 쓰이게 될 내용이고, 프로젝트를 진행하면서도 많이 나오게 될 것입니다. 파사드가 어떤 클래스가 연결되어 있는지 알고 싶다면 [공식문서](https://laravel.com/docs/10.x/facades#facade-class-reference)에서 찾아볼 수 있습니다. View 파사드를 살펴보면 `Illuminate\View\Factory`로 지정되어 있음을 알 수 있습니다.

#### 실시간 파사드

라라벨에는 실시간 파사드라는 기능이 있습니다. 만약 정석대로 파사드를 새로 만들려면 `Illuminate\Support\Facades\Facade`를 상속받는 클래스를 만들고 `Facade::getFacadeAccessor()`를 구현할 필요가 있습니다.
실시간 파사드 기능을 이용하면 어떨까요? 실시간 파사드는 직접 파사드 클래스를 상속받아서 만들지 않더라도 그저 네임스페이스에 Facades만 붙이면 사용할 수 있는 기능을 제공합니다. use에 다른 네임스페이스 형태를 포함하고 있음을 주목합시다.

```php
use Facades\App\Contracts\Publisher;

class Podcast extends Model
{
  public function publish()
  {
    Publisher::publish($this);
  }
}
```

이처럼 실시간 파사드를 사용하면 `Illuminate\Support\Facades\Facade`를 상속받아 파사드 클래스를 만들지 않더라도 간편하게 사용할 수 있습니다. 실시간 파사드의 네임스페이스에서 Facades 뒤에 있는 경로에 대해서는 컨테이너에서 처리되므로 우리가 신경 써야 할 사항은 별로 없습니다.

### 헬퍼함수

이제 라라벨에서 파사드 못지않게 많이 사용하는 헬퍼함수(Helper Functions)에 대해 알아보겠습니다. 컨트롤러에서 뷰를 반환하고 싶을 때 `view()`를 사용했고, 환경설정과 관련된 헬퍼함수로 `env()`,`config()`를 사용한 바 있습니다. 그밖에도 `session()`, `report()`, `logger()` 등이 존재합니다.
헬퍼함수는 특별한 것이 아니라 그냥 일반적인 함수입니다. 단지, 라라벨에서 이 함수들의 이름을 지칭하는 것이 헬퍼(Helper)인 만큼, 귀찮은 작업들을 간단하게 할 수 있도록 도와준다는 점이 특징입니다. 이미 사용한 적이 있는 `view()` 헬퍼함수의 구현을 살펴봅시다.

```php
use Illuminate\Contracts\View\Factory as ViewFactory;

if (! function_exists('view')) {
  function view($view = null, $data = [], $mergeData = [])
  {
    $factory = app(ViewFactory::class);

    if (func_num_args() === 0) {
      return $factory;
    }

    return $factory->make($view, $data, $mergeData);
  }
}
```

`app()`을 사용하여 `Illuminate\Contracts\View\Factory(as ViewFactory)`를 만족하는 객체를 생성하기 위해 의존성을 해결하고 `Factory::make()`를 호출하는 것을 볼 수 있습니다. 결국 헬퍼함수, 파사드, 그리고 마지막으로 의존성 주입으로의 생성에 있어서는, 사용 방법과 존재 의의가 다를 뿐 실질적으로는 기능적으로 큰 차이가 없다고 볼 수 있습니다.
라라벨의 헬퍼함수는 그 종류가 많으므로 나열하지는 않겠으나 [공식문서](https://laravel.com/docs/10.x/helpers)를 참고하면 어떤 함수들이 있는지 살펴볼 수 있습니다. 라라벨에는 많은 헬퍼함수가 존재하고 있으므로 프로젝트를 진행하면서 필요할 때마다 알아볼 예정입니다.

### Laravel Contracts

Contracts는 라라벨 프레임워크에서 단순히 인터페이스를 의미하며 `Illuminate\Contracts`에 위치합니다. 서비스 컨테이너의 바인딩에 따라 인터페이스를 컨테이너에 요청하면 구체 클래스를 던집니다. 이러한 인터페이스를 타입힌트에 사용하여 의존성을 주입함으로써 사용하는 것이 가능합니다. 예를 들어 `Illuminate\Contracts\View\Factory`를 컨테이너에서 요청하면 `Illuminate\View\Factory`를 반환합니다. 또한 `Illuminate\View\Factory`는 View 파사드에 바인딩되어 있는 구체 클래스이기도 합니다.

```php
use Illuminate\Contracts\View\Factory;

class WelcomeController extends Controller
{
  public function __construct(public readonly Factory $viewFactory) {}

  public function __invoke()
  {
    // View::make(), view()
    return $this->viewFactory->make('welcome');
  }
}
```

이처럼, 타입힌트하여 의존성을 주입하므로 로직에서 관련 기능을 사용할 것이라고 타 개발자에게 암시하는 일은 할 수 있습니다. 하지만 파사드와 의존성 주입, 둘 중에 무엇을 사용해도 어플리케이션을 만드는 것에는 문제가 없으므로 파사드를 사용하는 것을 굳이 망설일 필요는 없습니다. Contracts가 어떤 구체 클래스에 바인딩되어 있는지는 [공식문서](https://laravel.com/docs/10.x/contracts#contract-reference)에서 확인할 수 있습니다.

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
