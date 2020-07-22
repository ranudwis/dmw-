From [32mtests/TestCase.php:32[39m:
    [34m30[39m:     [33m{[39m
    [34m31[39m: [33m        foreach ([39m$keys [33mas [39m$key[33m) {[39m
  [31m>[39m [34m32[39m: [33m            eval([39m\Psy\sh[33m());[39m
    [34m33[39m: [33m            [39m$this[33m->[39massertArrayHasKey[33m([39m$key[33m, [39mjson_decode[33m([39m$this[33m->[39mclient[33m->[39mgetResponse[33m()->[39mgetContent[33m()));[39m
    [34m34[39m: [33m        }[39m
