# RL lib-downloader-open-rfm-full-list Cloud Function

Либа DownLoader-а открытого перечня РФМ

## Настройка окружения.

`make env`

Создаст файл `.env` - необходимо настроить окружение.

## Запуск тестов

Запустить команду:

`make test`

использовать в composer.lock так:

	{
            "name": "vlad/lib-downloader-open-rfm-full-list",

            "version": "1.0.2",

            "source": {

                "type": "git",

                "url": "https://github.com/vladislavpetrov4311/downloader-open-rfm-full-list",

                "reference": "26d59f5"

            },

            "dist": {

                "type": "zip",

                "url": "https://github.com/vladislavpetrov4311/downloader-open-rfm-full-list/archive/refs/heads/main.zip",

                "reference": "26d59f5",

                "shasum": ""

            },

            "require": {

                "php": "^8.0",

                "ruslanovich111/date-converter": "1.1.*"

            },

            "type": "library",

            "notification-url": "https://packagist.org/downloads/",

            "authors": [

                {

                    "name": "Ruslan",

                    "email": "ruslan@mail.ru"

                }

            ],

            "description": "Либа довнЛоадера открытого РФМ",

            "support": {

                "issues": "https://github.com/vladislavpetrov4311/downloader-open-rfm-full-list/issues",

                "source": "https://github.com/vladislavpetrov4311/downloader-open-rfm-full-list/tree/1.0.2"

            },

            "time": "2025-04-11T06:48:30+00:00"
        }

использовать в composer.json так:

	"require": {
        "vlad/lib-downloader-open-rfm-full-list": "1.0.2"
    }