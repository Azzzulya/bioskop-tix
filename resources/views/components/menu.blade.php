<nav class="nav flex-column">
    @foreach ($list as $row)
    <a class="nav-link {{ $isActive($row['label']) ? 'active' : ''}}" href="#">
        {{$row['label']}}   
    </a>
    @endforeach
</nav>