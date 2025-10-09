-H "Authorization: Basic Nmp2R042YmpTN2k3bkg3WGxwVGNJQWMwaThlTldnc0k6ckxpNm9vS1I2dmpBc3ZYbEFSZHJnUzNXT2dTekhScUZJaThSeHVlMEtUWXg=" 
-H "Content-Type: application/x-www-form-urlencoded"
-H "Accept:application/json"
-d '{"outboundSMSMessageRequest":{ \
        "address": "tel:+2250769006960", \
        "senderAddress":"tel:+2250747940211", \
        "outboundSMSTextMessage":{ \
            "message": "Hello!" \
        } \
    } \
}' \
"https://api.orange.com/smsmessaging/v1/outbound/tel%3A%2B2250000/requests"


