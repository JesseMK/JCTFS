

<html>
<head>
<title>Challenge 6</title>
<style type="text/css">
body { background:black; color:white; font-size:10pt; }
</style>
</head>
<body>
    <?php
    if(!$_COOKIE[user])
    {
        $val_id="admin";
        $val_pw="admin";

        for($i=0;$i<20;$i++)
        {
            $val_id=base64_encode($val_id);
            $val_pw=base64_encode($val_pw);

        }

        $val_id=str_replace("1","!",$val_id);
        $val_id=str_replace("2","@",$val_id);
        $val_id=str_replace("3","$",$val_id);
        $val_id=str_replace("4","^",$val_id);
        $val_id=str_replace("5","&",$val_id);
        $val_id=str_replace("6","*",$val_id);
        $val_id=str_replace("7","(",$val_id);
        $val_id=str_replace("8",")",$val_id);

        $val_pw=str_replace("1","!",$val_pw);
        $val_pw=str_replace("2","@",$val_pw);
        $val_pw=str_replace("3","$",$val_pw);
        $val_pw=str_replace("4","^",$val_pw);
        $val_pw=str_replace("5","&",$val_pw);
        $val_pw=str_replace("6","*",$val_pw);
        $val_pw=str_replace("7","(",$val_pw);
        $val_pw=str_replace("8",")",$val_pw);

        echo "user:";
        echo $val_id;
        echo "\n password: ";
        echo $val_pw;
    }
    ?>
</body>
</html>

<!--
user:Vm0wd@QyUXlVWGxWV0d^V!YwZDRWMVl$WkRSV0!WbDNXa!JTVjAxV@JETlhhMUpUVmpBeFYySkVUbGhoTVVwVVZtcEJlRll&U@tWVWJHaG9UVlZ$VlZadGNFSmxSbGw!VTJ0V!ZXSkhhRzlVVmxaM!ZsWmFjVkZ0UmxSTmJFcEpWbTEwYTFkSFNrZGpSVGxhVmpOU!IxcFZXbUZrUjA!R!UyMTRVMkpIZHpGV!ZFb$dWakZhV0ZOcmFHaFNlbXhXVm!wT!QwMHhjRlpYYlVaclVqQTFSMWRyV@&kV0!ERkZVbFJHVjFaRmIzZFdha!poVjBaT@NtRkhhRk&sYlhoWFZtMXdUMVF$TUhoalJscFlZbGhTV0ZSV@FFTlNiRnBZWlVaT!ZXSlZXVEpWYkZKRFZqQXhkVlZ!V@xaaGExcFlXa!ZhVDJOc@NFZGhSMnhUVFcxb@IxWXhaREJaVmxsM!RVaG9hbEpzY0ZsWmJGWmhZMnhXY!ZGVVJsTk&WMUo!VmpKNFQxWlhTbFpYVkVwV!lrWktTRlpxUm!GU@JVbDZXa!prYUdFeGNHOVdha0poVkRKT@RGSnJhR@hTYXpWeldXeG9iMWRHV@&STldHUlZUVlpHTTFSVmFHOWhiRXB*WTBac!dtSkdXbWhaTVZwaFpFZFNTRkpyTlZOaVJtOTNWMnhXWVZReFdsaFRiRnBZVmtWd!YxbHJXa$RUUmxweFVtMUdVMkpWYkRaWGExcHJZVWRGZUdOSE9WZGhhMHBvVmtSS!QyUkdTbkpoUjJoVFlYcFdlbGRYZUc&aU!XUkhWMjVTVGxOSGFGQlZiVEUwVmpGU!ZtRkhPVmhTTUhCNVZHeGFjMWR0U@tkWGJXaGFUVzVvV0ZreFdrZFdWa$B*VkdzMVYySkdhM@hXYTFwaFZURlZlRmR!U@s!WFJYQnhWVzB^YjFZeFVsaE9WazVPVFZad@VGVXlkREJXTVZweVkwWndXR0V^Y0ROV@FrWkxWakpPU!dKR!pGZFNWWEJ@Vm!0U!MxUXlUWGxVYTFwb!VqTkNWRmxZY0ZkWFZscFlZMFU!YVUxcmJEUldNalZUVkd^a!NGVnNXbFZXYkhCWVZHdGFWbVZIUmtoUFYyaHBVbGhDTmxkVVFtRmpNV!IwVTJ0a!dHSlhhR0ZVVnpWdlYwWnJlRmRyWkZkV@EzQjZWa@R*TVZZd0!WWmlla!pYWWxoQ!RGUnJXbEpsUm!SellVWlNhVkp!UW&oV!YzaHJWVEZzVjFWc!dsaGlWVnBQVkZaYWQyVkdWWGxrUkVKWFRWWndlVmt$V@&kWFIwVjRZMFJPV@!FeVVrZGFWM@hIWTIxS!IxcEhiRmhTVlhCS!ZtMTBVMU!^VlhoWFdHaFlZbXhhVjFsc!pHOVdSbXhaWTBaa@JHSkhVbGxhVldNMVlWVXhXRlZyYUZkTmFsWlVWa@Q0YTFOR!ZuTlhiRlpYWWtoQ!NWWkdVa@RWTVZwMFVtdG9VRll&YUhCVmJHaERUbXhrVlZGdFJtcE&WMUl$VlRKMGExZEhTbGhoUjBaVlZucFdkbFl$V@&OT@JFcHpXa@R$YVZORlNrbFdNblJyWXpGVmVWTnVTbFJpVlZwWVZGYzFiMWRHWkZkWGJFcHNVbTFTZWxsVldsTmhWa$AxVVd^d!YySllVbGhhUkVaYVpVZEtTVk&zYUdoTk!VcFZWbGN^TkdReVZrZFdiR!JvVW&wc@IxUldXbmRsYkZsNVkwVmtWMDFFUmpGWlZXaExWMnhhV0ZWclpHRldNMmhJV!RJeFMxSXhjRWhpUm!oVFZsaENTMVp0TVRCVk!VMTRWbGhvV0ZkSGFGbFpiWGhoVm!^c@NscEhPV$BTYkhCNFZrY$dOVll^V@&OalJXaFlWa!UxZGxsV!ZYaFhSbFp&WVVaa!RtRnNXbFZXYTJRMFdWWktjMVJ!VG!oU@JGcFlXV$hhUm!ReFduRlJiVVphVm0xU!NWWlhkRzloTVVwMFlVWlNWVlpXY0dGVVZscGhZekZ$UlZWdGNFNVdNVWwzVmxSS0!HRXhaRWhUYkdob!VqQmFWbFp0ZUhkTk!WcHlWMjFHYWxacmNEQmFSV!F$VmpKS@NsTnJhRmRTTTJob!ZrUktSMVl^VG&WVmJFSlhVbFJXV!ZaR!l*RmlNV!JIWWtaV!VsZEhhRlJVVm!SVFpXeHNWbGRzVG!oU!ZFWjZWVEkxYjFZeFdYcFZiR@hZVm!^d!lWcFZXbXRrVmtwelZtMXNWMUl*YURWV0!XUXdXVmRSZVZaclpGZGliRXB&Vld0V!MySXhiRmxqUldSc!ZteEtlbFp0TURWWFIwcEhZMFpvV@sxSGFFeFdNbmhoVjBaV@NscEhSbGROTW!oSlYxUkplRk!^U!hoalJXUmhVbXMxV0ZZd!ZrdE&iRnAwWTBWa!dsWXdWalJXYkdodlYwWmtTR0ZHV@xwaVdHaG9WbTE0YzJOc!pISmtSM0JUWWtad0&GWlhNVEJOUmxsNFYyNU9hbEpYYUZoV@FrNVRWRVpzVlZGWWFGTldhM0I@VmtkNFlWVXlTa!pYV0hCWFZsWndSMVF^V@tOVmJFSlZUVVF$UFE9PQ==
password: Vm0wd@QyUXlVWGxWV0d^V!YwZDRWMVl$WkRSV0!WbDNXa!JTVjAxV@JETlhhMUpUVmpBeFYySkVUbGhoTVVwVVZtcEJlRll&U@tWVWJHaG9UVlZ$VlZadGNFSmxSbGw!VTJ0V!ZXSkhhRzlVVmxaM!ZsWmFjVkZ0UmxSTmJFcEpWbTEwYTFkSFNrZGpSVGxhVmpOU!IxcFZXbUZrUjA!R!UyMTRVMkpIZHpGV!ZFb$dWakZhV0ZOcmFHaFNlbXhXVm!wT!QwMHhjRlpYYlVaclVqQTFSMWRyV@&kV0!ERkZVbFJHVjFaRmIzZFdha!poVjBaT@NtRkhhRk&sYlhoWFZtMXdUMVF$TUhoalJscFlZbGhTV0ZSV@FFTlNiRnBZWlVaT!ZXSlZXVEpWYkZKRFZqQXhkVlZ!V@xaaGExcFlXa!ZhVDJOc@NFZGhSMnhUVFcxb@IxWXhaREJaVmxsM!RVaG9hbEpzY0ZsWmJGWmhZMnhXY!ZGVVJsTk&WMUo!VmpKNFQxWlhTbFpYVkVwV!lrWktTRlpxUm!GU@JVbDZXa!prYUdFeGNHOVdha0poVkRKT@RGSnJhR@hTYXpWeldXeG9iMWRHV@&STldHUlZUVlpHTTFSVmFHOWhiRXB*WTBac!dtSkdXbWhaTVZwaFpFZFNTRkpyTlZOaVJtOTNWMnhXWVZReFdsaFRiRnBZVmtWd!YxbHJXa$RUUmxweFVtMUdVMkpWYkRaWGExcHJZVWRGZUdOSE9WZGhhMHBvVmtSS!QyUkdTbkpoUjJoVFlYcFdlbGRYZUc&aU!XUkhWMjVTVGxOSGFGQlZiVEUwVmpGU!ZtRkhPVmhTTUhCNVZHeGFjMWR0U@tkWGJXaGFUVzVvV0ZreFdrZFdWa$B*VkdzMVYySkdhM@hXYTFwaFZURlZlRmR!U@s!WFJYQnhWVzB^YjFZeFVsaE9WazVPVFZad@VGVXlkREJXTVZweVkwWndXR0V^Y0ROV@FrWkxWakpPU!dKR!pGZFNWWEJ@Vm!0U!MxUXlUWGxVYTFwb!VqTkNWRmxZY0ZkWFZscFlZMFU!YVUxcmJEUldNalZUVkd^a!NGVnNXbFZXYkhCWVZHdGFWbVZIUmtoUFYyaHBVbGhDTmxkVVFtRmpNV!IwVTJ0a!dHSlhhR0ZVVnpWdlYwWnJlRmRyWkZkV@EzQjZWa@R*TVZZd0!WWmlla!pYWWxoQ!RGUnJXbEpsUm!SellVWlNhVkp!UW&oV!YzaHJWVEZzVjFWc!dsaGlWVnBQVkZaYWQyVkdWWGxrUkVKWFRWWndlVmt$V@&kWFIwVjRZMFJPV@!FeVVrZGFWM@hIWTIxS!IxcEhiRmhTVlhCS!ZtMTBVMU!^VlhoWFdHaFlZbXhhVjFsc!pHOVdSbXhaWTBaa@JHSkhVbGxhVldNMVlWVXhXRlZyYUZkTmFsWlVWa@Q0YTFOR!ZuTlhiRlpYWWtoQ!NWWkdVa@RWTVZwMFVtdG9VRll&YUhCVmJHaERUbXhrVlZGdFJtcE&WMUl$VlRKMGExZEhTbGhoUjBaVlZucFdkbFl$V@&OT@JFcHpXa@R$YVZORlNrbFdNblJyWXpGVmVWTnVTbFJpVlZwWVZGYzFiMWRHWkZkWGJFcHNVbTFTZWxsVldsTmhWa$AxVVd^d!YySllVbGhhUkVaYVpVZEtTVk&zYUdoTk!VcFZWbGN^TkdReVZrZFdiR!JvVW&wc@IxUldXbmRsYkZsNVkwVmtWMDFFUmpGWlZXaExWMnhhV0ZWclpHRldNMmhJV!RJeFMxSXhjRWhpUm!oVFZsaENTMVp0TVRCVk!VMTRWbGhvV0ZkSGFGbFpiWGhoVm!^c@NscEhPV$BTYkhCNFZrY$dOVll^V@&OalJXaFlWa!UxZGxsV!ZYaFhSbFp&WVVaa!RtRnNXbFZXYTJRMFdWWktjMVJ!VG!oU@JGcFlXV$hhUm!ReFduRlJiVVphVm0xU!NWWlhkRzloTVVwMFlVWlNWVlpXY0dGVVZscGhZekZ$UlZWdGNFNVdNVWwzVmxSS0!HRXhaRWhUYkdob!VqQmFWbFp0ZUhkTk!WcHlWMjFHYWxacmNEQmFSV!F$VmpKS@NsTnJhRmRTTTJob!ZrUktSMVl^VG&WVmJFSlhVbFJXV!ZaR!l*RmlNV!JIWWtaV!VsZEhhRlJVVm!SVFpXeHNWbGRzVG!oU!ZFWjZWVEkxYjFZeFdYcFZiR@hZVm!^d!lWcFZXbXRrVmtwelZtMXNWMUl*YURWV0!XUXdXVmRSZVZaclpGZGliRXB&Vld0V!MySXhiRmxqUldSc!ZteEtlbFp0TURWWFIwcEhZMFpvV@sxSGFFeFdNbmhoVjBaV@NscEhSbGROTW!oSlYxUkplRk!^U!hoalJXUmhVbXMxV0ZZd!ZrdE&iRnAwWTBWa!dsWXdWalJXYkdodlYwWmtTR0ZHV@xwaVdHaG9WbTE0YzJOc!pISmtSM0JUWWtad0&GWlhNVEJOUmxsNFYyNU9hbEpYYUZoV@FrNVRWRVpzVlZGWWFGTldhM0I@VmtkNFlWVXlTa!pYV0hCWFZsWndSMVF^V@tOVmJFSlZUVVF$UFE9PQ== -->
