<table style="width: 100%;">
    <tbody>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{$example->name}}</td>
        </tr>
        <tr>
            <td>Pekerjaan</td>
            <td>:</td>
            <td>{{$example->job}}</td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>:</td>
            <td>{{$example->age}}</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$example->address}}</td>
        </tr>
        <tr>
            <td>Foto</td>
            <td>:</td>
            <td><img src="{{$example->image_post}}" class="rounded" width="50"></td>
        </tr>
    </tbody>
</table>