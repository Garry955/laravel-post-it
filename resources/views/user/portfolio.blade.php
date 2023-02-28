<section x-data="{
    selectedTab: 'card',
    activeClasses: 'bg-primary text-white',
    inactiveClasses: 'text-body-color hover:bg-primary hover:text-white',
}" class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
    <div class="-mx-4 flex flex-wrap justify-center">
        <div class="w-full px-4">
            <ul class="mb-12 flex flex-wrap justify-center space-x-1">
                @foreach ($tabs as $tab)
                    <li class="mb-1">
                        <button @click="selectedTab = '{{ $tab }}' "
                            :class="selectedTab == '{{ $tab }}' ? activeClasses : inactiveClasses"
                            class="inline-block rounded-lg py-2 px-20 text-center text-base font-semibold transition md:py-3">
                            {{ $tab }}
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div :class="selectedTab == 'posts' || selectedTab == 'posts' ? 'block' : 'hidden'" class="w-full px-4">
        @foreach ($posts as $post)
            <x-post.card :post="$post" />
        @endforeach
    </div>
    <div :class="selectedTab == 'images' || selectedTab == 'images' ? 'block' : 'hidden'" class="w-full px-4">
        Images
    </div>
    <div :class="selectedTab == 'card' || selectedTab == 'card' ? 'block' : 'hidden'" class="w-full px-4">
          <x-user.card :user="$user"/>
    </div>
    </div>
    {{-- @foreach ($items[$tab] as $key => $item)
                @if ($tab == 'card')
                <div
                    :class="selectedTab == '{{ $tab }}' || selectedTab == '{{ $tab }}' ? 'block' : 'hidden' "
                    class="w-full px-4">
                    {{ $item }}
                </div>
                @elseif($tab == "images")
                    <div
                        :class="selectedTab == '{{ $tab }}' || selectedTab == '{{ $tab }}' ? 'block' : 'hidden' "
                        class="w-full px-4">
                        @php
                            // var_dump($item);   
                        @endphp
                        <x-post.card post="{{ $item }}"/>
                    </div> --}}
    {{-- @foreach ($item as $k => $v)
                        {{ $v }}
                    @endforeach --}}
    {{-- @elseif($tab == "posts")
                    @foreach ($item as $k => $v)
                        <div
                            :class="selectedTab == '{{ $tab }}' || selectedTab == '{{ $tab }}' ? 'block' : 'hidden' "
                            class="w-full px-4">
                            {{ $v }}
                        </div>
                    @endforeach
                @endif --}}
    {{-- @endforeach
        @endforeach     --}}
    {{-- <div class="-mx-4 flex flex-wrap">
      <div
        :class="selectedTab == 'Images' || selectedTab == 'Images' ? 'block' : 'hidden' "
        class="w-full px-4 md:w-1/2 xl:w-1/3"
      >
        <div class="relative mb-12">
          <div class="overflow-hidden rounded-lg">
            <img
              src="https://cdn.tailgrids.com/2.0/image/marketing/images/portfolio/portfolio-01/image-01.jpg"
              alt="portfolio"
              class="w-full"
            />
          </div>
          <div
            class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg"
          >
            <span class="text-primary mb-2 block text-sm font-semibold">
              Branding
            </span>
            <h3 class="text-dark mb-4 text-xl font-bold">Branding Design</h3>
            <a
              href="javascript:void(0)"
              class="text-body-color hover:bg-primary hover:border-primary inline-block rounded-md border py-3 px-7 text-sm font-semibold transition hover:text-white"
            >
              View Details
            </a>
          </div>
        </div>
      </div>

      <div class="-mx-4 flex flex-wrap">
        <div
          :class="selectedTab == 'Posts' || selectedTab == 'Posts' ? 'block' : 'hidden' "
          class="w-full px-4 md:w-1/2 xl:w-1/3"
        >
          <div class="relative mb-12">
            <div class="overflow-hidden rounded-lg">
              <img
                src="https://cdn.tailgrids.com/2.0/image/marketing/images/portfolio/portfolio-01/image-01.jpg"
                alt="portfolio"
                class="w-full"
              />
            </div>
            <div
              class="relative z-10 mx-7 -mt-20 rounded-lg bg-white py-9 px-3 text-center shadow-lg"
            >
              <span class="text-primary mb-2 block text-sm font-semibold">
                Branding
              </span>
              <h3 class="text-dark mb-4 text-xl font-bold">Branding Design</h3>
              <a
                href="javascript:void(0)"
                class="text-body-color hover:bg-primary hover:border-primary inline-block rounded-md border py-3 px-7 text-sm font-semibold transition hover:text-white"
              >
                View Details
              </a>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div> --}}
</section>
