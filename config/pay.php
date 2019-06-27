<?php

return [
    'alipay' => [
        'app_id'         => '2016100200645839',
        'ali_public_key' => 'MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAmv0K43gun5cktIxtEqXaLIp5hC8ujBhYPYYA/yGeIDkC2Jb+yhtFusxiAxbHZNwHaaa0pDs4lmmiKjvHERea9gjkFULhTCkw66EuByh/qpNrUDfU8+r9Ytvxy1asdUsYr1ZNj31RSdngRoHQf/YP5ix0ULrwumWUHwuqn2C0Z06i18QAsHrBNcsf0qHHnhvkgyh67x6OKxDOCFtyGrbm53N670Z1d0M97Yyu2zlkzV2In3NQ8JmRMrxQh9UHGnOjsWRS0WLPvESvu1qGo2Y+tUOSdvMM9BDuf2oNqHo8vbnJnOvlZMm+2poahN1SL+t+aoZDbf+b4IagfZ9U/i8k9wIDAQAB',
        'private_key'    => 'MIIEowIBAAKCAQEAq0K6XCici6dJLZCGYc6u/LLFb9dYx7ua2PZQXXHfWrCnEhgSZgUpe7EbMWQ5YtRcr3Ychs4sZsnP7q8Lua0EQOJy0b14jJc+dZ/Zyt2HAt3Uv6CBHMNYC1tvKFwcPHMMrSgR+PYQdOROLuU23Dinu4ZVYIQM7dtHsgWl62znvEbdU/5V9gXmh0heRg24uMQhEN2tbAPbbakW3TA20tJsabmFuuL3MmJh59gkSAPSr2ZQ4GnVf1+j6L3NNZzb20TACAlPcdRCK8325YZoHg5sc8Yhui8VmESBPTNzhl/YYofrQYlj2uE6guEXIsLjFaEb5lO83225kSxS/VQnFvmSwwIDAQABAoIBABmmrPMQwiHItJU2iGot4tfGjvvpbUq9Nrw4aGEWpTWYL+3t3ROawlPcew4yzMWYuSkur6chSlU69QHzBfaRi4mMYVY44s1r+db0UlKoS4iKYUsyZyQ/vfg1gbix0yjaspNc5RQ9Bsn7SBqOCmGBut3DiRYjsSwPI/XuEqPoc+0nEULJz6khzkzzFcq/A38gqZPkF+PJRhJHunPdrtFyuAuztVL6udtrCPRDXO0Q8gGp99ygmLHclTubv45XmY3Y6uAyubn1PAxWgB6YOcLhytBFwat7v8XyN7yuvwdqqcAmLGQxcfpHp3B7p/oDmn+h0m4fUBXydOfUuCqgkVw8NYECgYEA2+zBOZBgTd3+LIlMvlL15qFf4iwWBgaZ4jzgodIMWu1txBZk9121p4i2KUxIvscGRC5mSVVR/Ji1l5uwyK/W0vmRx2dAGWSNts9dIJKqNf5NrGkLC6moJguHnnlSLCQr0hHU69TOfosL8YtIsh2/c4Tbx9pI4hmei+PRb9WTCGkCgYEAx1pufpbY77I5o+tdFfyLBzNBZhAe0LhG/1Rc3WxkLXv9SApOgxzx4dKbKyrwTgzIibTsP/Jq8FTOIA6Sx7V74s3Z9XRiw4wjwlpgjzw5gHjLPL5ThgctoR3j2/vmoHyJQS7tRC8h64jBhdXEWVwfx0LA0Z94bnZCdYnypqXRvEsCgYEArAIelqE/UWfBdp/kcC9+uGWbEtCcYRYkoXgv0SDyHOP6qBVD3t1iSKh6oQ5TDzOmyQjpY43h1Ai0buGMgUpWYShlRmqRDctBs6u4ENPlYNmHcsOtqe+F3kvCRMZq6K9ZvrHHsLP+1aZ3LvJbZ0QxC27sXwFxY7XZ9Vu34RpQJ5ECgYB2ltsoPwAqBvG3C2pCjAsAa4M5/dj2/MhvV3Yu2i31yM5xLoBqCqvxVGGuGkr9gylAkfoASGtJMIm2FDVIzDM4RpCkLWobPaCAG1dZnc/vFux/5BC3qEmCkM9dq8oUKkFUH2BRsWASRzYoMXQuXFkjJhiiGqV/wKXkWf2ZGQddZQKBgBXQ9bUTObv5goRC+JC6jPcYJiwCAsclVOrdPkn007NniC9vfb7W3WslNEzLHGwnGm54C2PhECJbD8HZ0pjElzG2FPLfYr+fJEOCSqVTIGV26INaou8hpOy/3cF23fVUuXoBDT7E5geumgOx2snBrs0VFye06qiPnW9gq7q+nuZ3',
        'log'            => [
            'file' => storage_path('logs/alipay.log'),
        ],
    ],

    'wechat' => [
        'app_id'      => '',
        'mch_id'      => '',
        'key'         => '',
        'cert_client' => '',
        'cert_key'    => '',
        'log'         => [
            'file' => storage_path('logs/wechat_pay.log'),
        ],
    ],
];