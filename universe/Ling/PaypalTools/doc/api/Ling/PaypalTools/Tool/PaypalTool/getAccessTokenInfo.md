[Back to the Ling/PaypalTools api](https://github.com/lingtalfi/PaypalTools/blob/master/doc/api/Ling/PaypalTools.md)<br>
[Back to the Ling\PaypalTools\Tool\PaypalTool class](https://github.com/lingtalfi/PaypalTools/blob/master/doc/api/Ling/PaypalTools/Tool/PaypalTool.md)


PaypalTool::getAccessTokenInfo
================



PaypalTool::getAccessTokenInfo — Returns an array of access token information, based on the given client id and secret.




Description
================


public static [PaypalTool::getAccessTokenInfo](https://github.com/lingtalfi/PaypalTools/blob/master/doc/api/Ling/PaypalTools/Tool/PaypalTool/getAccessTokenInfo.md)(string $clientId, string $secret) : array | false




Returns an array of access token information, based on the given client id and secret.

The returned array is defined by paypal, but at the moment, returns the following properties:

- scope: str, see paypal docs for more info
- access_token: str, the access token
- token_type: str=Bearer, see paypal docs for more info
- app_id: str, see paypal docs for more info
- expires_in: int, the number of seconds the access token is valid
- nonce: str, see paypal docs for more info


https://developer.paypal.com/docs/platforms/get-started/#exchange-your-api-credentials-for-an-access-token




Parameters
================


- clientId

    

- secret

    


Return values
================

Returns array | false.








Source Code
===========
See the source code for method [PaypalTool::getAccessTokenInfo](https://github.com/lingtalfi/PaypalTools/blob/master/Tool/PaypalTool.php#L33-L65)


See Also
================

The [PaypalTool](https://github.com/lingtalfi/PaypalTools/blob/master/doc/api/Ling/PaypalTools/Tool/PaypalTool.md) class.



