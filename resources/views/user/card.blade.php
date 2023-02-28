{{-- User Card Section Start --}}
<div class="mb-10 overflow-hidden rounded-lg border-primary border-2 text-white text-left w-3/4 mx-auto">
    <div class="p-8 flex flex-col">
        <div class="w-full flex items-stretch mb-2">
            <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Name</label>
            <label class="w-full text-[22px] ml-4 text-primary">{{ $user->name }}</label>
        </div>
        <div class="w-full flex items-stretch mb-2">
            <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">E-mail</label>
            <label class="w-full text-[22px] ml-4 text-primary">{{ $user->email }}</label>
        </div>
        <div class="w-full flex items-stretch mb-2">
            <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Username</label>
            <label class="w-full text-[22px] ml-4 text-primary">{{ $user->username }}</label>
        </div>
        <div class="w-full flex items-stretch mb-2">
            <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">City</label>
            <label class="w-full text-[22px] ml-4 text-primary">{{ $user->city }}</label>
        </div>
        <div class="w-full flex items-stretch mb-2">
            <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Gender</label>
            <label class="w-full text-[22px] ml-4 text-primary">{{ ($user->gender == 0) ? 'Male' : 'Female' }}</label>
        </div>
        <div class="w-full flex items-stretch mb-2">
            <label class="w-1/3 text-[22px] border-r-2 border-r-primary ">Description</label>
            <label class="w-full text-[22px] ml-4 text-primary">{{ $user->description ? $user->description : 'No description' }}</label>
        </div>
    </div>
</div>
{{-- User Card Section End --}}