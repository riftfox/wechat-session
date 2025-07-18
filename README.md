# wechat-session

微信会话信息抽象接口，提供统一的会话信息数据结构。

## 功能特性

- 统一的会话信息接口定义
- 标准的会话信息数据结构实现
- 与其他微信 SDK 模块无缝集成
- 支持 openid、session_key、unionid 等会话属性

## 安装

```bash
composer require riftfox/wechat-session
```

## 使用方法

### 基础用法

```php
use Riftfox\Wechat\Session\Session;
use Riftfox\Wechat\Session\SessionFactory;

// 使用工厂创建会话实例
$factory = new SessionFactory();
$session = $factory->createSession();

// 设置会话信息
$session->setOpenId('user-open-id');
$session->setSessionKey('session-key');
$session->setUnionId('union-id');

// 获取会话信息
echo $session->getOpenId();      // 用户唯一标识
echo $session->getSessionKey();   // 会话密钥
echo $session->getUnionId();     // unionid
```

### 在其他模块中使用

```php
use Riftfox\Wechat\Session\SessionInterface;

class YourProvider
{
    public function someMethod(SessionInterface $session)
    {
        // 使用会话信息
        $openid = $session->getOpenId();
        $sessionKey = $session->getSessionKey();
    }
}
```

## 接口说明

### SessionInterface

```php
interface SessionInterface
{
    public function getOpenId(): ?string;
    public function getSessionKey(): ?string;
    public function getUnionId(): ?string;
    
    public function setOpenId(string $openId): self;
    public function setSessionKey(string $sessionKey): self;
    public function setUnionId(?string $unionId): self;
}
```

### SessionFactoryInterface

```php
interface SessionFactoryInterface
{
    /**
     * 创建会话实例
     */
    public function createSession(): SessionInterface;
    
    /**
     * 从数组创建会话实例
     */
    public function createSessionFromArray(array $data): SessionInterface;
}
```

## 相关模块

- [wechat-js-code-to-session](https://github.com/riftfox/wechat-js-code-to-session) - 小程序登录凭证校验
- [wechat-check-session](https://github.com/riftfox/wechat-check-session) - 校验会话状态
- [wechat-session-signature](https://github.com/riftfox/wechat-session-signature) - 会话签名计算

## 代码示例

### 集成到登录凭证校验

```php
use Riftfox\Wechat\JsCodeToSession\JsCode2SessionProvider;
use Riftfox\Wechat\Session\SessionFactory;

$sessionFactory = new SessionFactory();
$provider = new JsCode2SessionProvider(
    $client,
    $requestFactory,
    $uriFactory,
    $sessionFactory,
    $exceptionFactory
);

$session = $provider->code2Session($application, 'js_code');
```

### 集成到会话校验

```php
use Riftfox\Wechat\CheckSession\CheckSessionProvider;
use Riftfox\Wechat\Session\Session;

$session = new Session();
$session->setOpenId('user-open-id')
    ->setSessionKey('session-key');

$provider->checkSession($application, $session);
```

## 版本要求

- PHP 7.4 或以上
- composer 2.0 或以上

## License

MIT