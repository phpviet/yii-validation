<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii Validation</h1>
    <br>
</p>

Yii validation hổ trợ kiểm tra các kiểu dữ liệu đặc thù trong nước ta.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/phpviet/yii-validation.svg?style=flat-square)](https://packagist.org/packages/phpviet/yii-validation)
[![Build Status](https://img.shields.io/travis/phpviet/yii-validation/master.svg?style=flat-square)](https://travis-ci.org/phpviet/yii-validation)
[![Quality Score](https://img.shields.io/scrutinizer/g/phpviet/yii-validation.svg?style=flat-square)](https://scrutinizer-ci.com/g/phpviet/yii-validation)
[![StyleCI](https://styleci.io/repos/187064264/shield?branch=master)](https://styleci.io/repos/187064264)
[![Total Downloads](https://img.shields.io/packagist/dt/phpviet/yii-validation.svg?style=flat-square)](https://packagist.org/packages/phpviet/yii-validation)

## Cài đặt

Cài đặt Yii Validation thông qua [Composer](https://getcomposer.org):

```bash
composer require phpviet/yii-validation
```

## Cách sử dụng

### Các kiểu dữ liệu được hổ trợ kiểm tra hiện tại

- [`Số điện thoại di động`](#Số-điện-thoại-di-động)
- [`Số điện thoại bàn`](#Số-điện-thoại-bàn)
- [`Thẻ căn cước / chứng minh thư`](#Thẻ-căn-cước-/-chứng-minh-thư)
- [`Địa chỉ IP`](#Địa-chỉ-IP)

### Số điện thoại di động

```php
// Khai báo trong `Model`:

public function rules()
{
    return [
        [['mobile_number'], 'mobile_vn']
    ];
}
```

### Số điện thoại bàn

```php
// Khai báo trong `Model`:

public function rules()
{
    return [
        [['land_line_number'], 'land_line_vn']
    ];
}
```

### Thẻ căn cước / chứng minh thư

```php
// Khai báo trong `Model`:

public function rules()
{
    return [
        [['id_number'], 'id_vn']
    ];
}
```

### Địa chỉ IP

```php
// Khai báo trong `Model`:

public function rules()
{
    return [
        [['ip_address'], 'ip_vn'], // Kiểm tra tất cả ipv4 HOẶC v6 chỉ cần ip trong nước là được.
        [['ip_address'], 'ipv4_vn'], // Kiểm tra phải là ipv4 trong nước.
        [['ip_address'], 'ipv6_vn'] // Kiểm tra phải là ipv6 trong nước.
    ];
}
```

## Ngôn ngữ

Nếu như bạn muốn thay đổi các error message thì hãy định nghĩa `translations` cho `i18n` component:

```php
'components' => [
    'i18n' => [
        'translations' => [
            'phpviet/validation' => [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@app/messages',
                'fileMap' => [
                    'phpviet/validation' => 'validation.php' // file chứa các thông báo
                ] 
            ]       
        ]
    ]
]
```

## Dành cho nhà phát triển

Nếu như bạn cảm thấy các kiểu kiểm tra dữ liệu bên trên vẫn chưa đủ đối với thị trường 
trong nước và bạn muốn đóng góp để phát triển chung, chúng tôi rất hoan nghênh! 
Hãy tạo các `issue` để đóng góp ý tưởng cho phiên bản kế tiếp hoặc tạo `PR` 
để đóng góp thêm các kiểu kiểm tra dữ liệu còn thiếu sót. Cảm ơn!
