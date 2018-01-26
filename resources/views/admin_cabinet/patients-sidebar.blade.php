<div class="sidebar column is-2 has-text-left">
	<form class="search-field-form">
		<p class="control has-icons-left">
		<input type="text" id="search" class="search-field input">
			<span class="icon is-small is-left">
				<i class="search-field-ico fa fa-search"></i>
			</span>
		</p>
		
	</form>
	<div id="users">
		@foreach( $sidebarUsers as $user )
			<p>
				<a class="control-buttons__email-change" href="{{ url('/admin/patient/'.$user->id) }}">{{ $user->name }}</a>
			</p>
		@endforeach
	<div id="users">
</div>