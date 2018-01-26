<section class="sidebar">
  <div class="control-buttons">
    <form class="search-field">
      <i class="search-field__ico fa fa-search"></i>
      <input class="search-field__serch-input" id="search" type="text"/>
    </form>
	<div id="users">
    @foreach( $users as $user )
      <a class="control-buttons__email-change" href="{{ url('/admin/patient/'.$user->id) }}">{{ $user->name }}</a>
    @endforeach
	</div>
  </div>
</section>
