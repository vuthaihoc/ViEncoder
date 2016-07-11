## Cài đặt

Composer

    composer require vuthaihoc/vi_encoder

## Code supported 

    private static $codes_supported = [
                                        "VIQR",
                                        "VPS-Win",
                                        "UNICODE",
                                        "TCVN-3"
                                    ]
                                    
Kiểm tra có hỗ trợ hay không

    Detector::isSupported($sourceEncode);
    
Detect bảng mã của đoạn văn

    $using_code = Detector::usingCode($string);
    
## Chuyển đổi giữa các bảng mã

    $new_string = Converter::changeEncode($string, $targetCode, [$sourceCode = null]);
    
`$targetCode` và `$sourceCode` có thể dùng cont của Code cho chuẩn xác 
tên bảng mã. `$sourceCode` bỏ trống thì hệ thống sẽ tự động nhận diện 
bảng mã `$string` đang dùng.

    const CHARSET_TCVN3 = 'TCVN-3';
    const CHARSET_VNI_WIN = 'VNI-WIN';
    const CHARSET_VIQR = 'VIQR';
    const CHARSET_UNICODE = 'UNICODE';
    
    
## Credit

Tham khảo:

- Chuyển đổi giữa các bảng mã https://github.com/anhskohbo/u-convert
- Tự động xác định bảng mã đang dùng của đoạn văn http://e-cadao.com/VietUni_files/vietuni.htm
- Tham chiếu ký tự tiếng Việt trong các bảng mã http://vietunicode.sourceforge.net/charset/