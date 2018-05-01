<style>
    @font-face {
        font-family: 'THSarabunNewRegular';
        src: url('http://webfont.webdesigner.in.th/font/THSarabunNew/thsarabunnew.eot');
        src: url('http://webfont.webdesigner.in.th/font/THSarabunNew/thsarabunnew.eot') format('embedded-opentype'),
             url('http://webfont.webdesigner.in.th/font/THSarabunNew/thsarabunnew.woff') format('woff'),
            url('http://webfont.webdesigner.in.th/font/THSarabunNew/thsarabunnew.ttf') format('truetype'),
            url('http://webfont.webdesigner.in.th/font/THSarabunNew/thsarabunnew.svg#THSarabunNewRegular') format('svg');
    }
    body{
        font-family: THSarabunNewRegular;
        font-size: 16px;
    }
    p{
        font-family: THSarabunNewRegular; 
        font-size: 26px;
    }
    table{
        border-collapse: collapse;
        margin: auto;
        
    }
    td,th{
        border: 1px solid;
        text-align: center;
        padding-left: 5px;
        padding-right: 5px;
    }
</style>
<body>
    <center>
        <p>รายการการสั่งอาหาร{{ $type }}</p>
        <table>
            <thead>
                <tr>
                    <td>ลำดับที่</td>
                    <td>รายการอาหาร</td>
                    <td>จำนวน</td>
                    <td>ราคา(บาท)</td>
                    <td>วันที่สั่ง</td>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->menus->name }}</td>
                        <td>{{ $order->amount }}</td>
                        <td>{{ $order->menus->price }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </center>
    
</body>