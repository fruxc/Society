@if (Auth::guard('web')->check())
<p class="text-success">
  You're logged in as a <Strong> USER </STRONG>
</p>
@else

<p class="text-danger">
  You're logged out as a <Strong> USER </STRONG>
</p>
@endif

@if (Auth::guard('admin')->check())
<p class="text-success">
  You're logged in as a <Strong> ADMIN </STRONG>
</p>
@else

<p class="text-danger">
  You're logged out as a <Strong> ADMIN </STRONG>
</p>
@endif