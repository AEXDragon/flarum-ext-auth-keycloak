# flarum-ext-auth-keycloak

Flarum的Keycloak OAuth扩展

允许用户使用Keycloak进行登录、注销。

## 安装

使用composer进行安装：
```
composer require hystar/flarum-ext-auth-keycloak:"*"
```

## 升级

```
composer update hystar/flarum-ext-auth-keycloak
```

## 使用

开启扩展后，请在设置页面中编辑保存，以使拓展工作。

## Keycloak设置

为Keycloak version 4.8.3-final版本编写，测试到15.1.0。可能会与您所使用的略有所不同。

点击 客户端 标签，为你的Flarum实例添加一个新的客户端（或使用现有的）。根URL是你的Flarum实例的网址。

![添加Keycloak客户端](https://gitee.com/AEXDragon/flarum-ext-auth-keycloak/raw/master/images/keycloak-add-client.png "添加Keycloak客户端")

为了将Keycloak的角色映射到Flarum组，需要将角色从userinfo端点可见。为客户端添加一个mapper。

![创建 Keycloak mapper](https://gitee.com/AEXDragon/flarum-ext-auth-keycloak/raw/master/images/keycloak-create-mapper-1.png "创建 Keycloak mapper")

![添加 role mapper 到Keycloak客户端](https://gitee.com/AEXDragon/flarum-ext-auth-keycloak/raw/master/images/keycloak-create-mapper-2.png "添加 role mapper 到Keycloak客户端")

从 领域设置 标签，找到OpenId Connect工作流使用的密钥（默认为RS256）。复制算法以及公钥。

![Find Keycloak keys](https://gitee.com/AEXDragon/flarum-ext-auth-keycloak/raw/master/images/keycloak-find-keys.png "Find Keycloak keys")

## 扩展的设置
* 服务器地址：如 https://keycloak.example.com/auth 注意尾部没有斜线。
* Realm：你为你的Flarum创建的域。
* Client ID：你在上面创建的客户端的ID。
* Client Secret：不设置默认为客户端ID。
* 加密算法：默认为RS256
* 加密秘钥（或证书）：你可以在这里张贴你在Keycloak上按下 "公共密钥 "按钮后显示的内容。
* 角色到用户组映射：一个关联数组，角色是键，组名是值，以JSON格式。例如： `{"ROLE_MEMBER":"Member","ROLE_MODERATOR":"Mods","ROLE_ADMIN":"Admin"}`
