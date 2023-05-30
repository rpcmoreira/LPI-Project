@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://www.ufp.pt/app/uploads/2018/08/logoufp_174x70.png" class="d-inline-block" width="240" height="100" class="logo" alt="UFP Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
