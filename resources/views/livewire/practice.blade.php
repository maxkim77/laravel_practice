<div>
    <h1>{{ $post }}</h1> 
    <p>-----구분 줄--------</p>
    <!--ddd  -->
    {{-- 
    <input type="text" wire:model.live="post">
    이 입력 필드는 wire:model="post" 디렉티브를 사용하여 Livewire 컴포넌트의 $post 프로퍼티와 양방향 데이터 바인딩을 설정합니다.
    --}}
    <input type="text" wire:model.live="post"> 
    {{-- <input type="text" wire:model.live="post"> --}}
    {{-- 사용자가 입력 필드에 텍스트를 입력하면, 그 값이 실시간으로 Livewire 컴포넌트의 $post 변수에 저장됩니다. --}}
    <p>-----구분 줄--------</p>
    
    {{-- 
    <button wire:click="click">
    이 버튼은 클릭 이벤트가 발생했을 때, click이라는 메서드를 호출하도록 Livewire에 지시합니다.
    wire:click="click" 디렉티브는 사용자가 버튼을 클릭할 때 페이지 전체를 새로고침하지 않고 Livewire 컴포넌트 내의 click 메서드를 실행시킵니다.
    이 메서드는 특정 액션을 수행하거나 데이터를 처리하는 데 사용할 수 있으며, 이는 서버 사이드에서 실행되며 그 결과가 클라이언트 사이드에 반영됩니다.
    --}}
    <h1>{{ $clicked }}</h1>
    <button wire:click="click">Click me</button> 
    <p>-----구분 줄--------</p>
    
    {{-- 
    <form wire:submit.prevent="validation">
    이 태그는 Livewire의 wire:submit.prevent 디렉티브를 사용하는 HTML 폼입니다.
    wire:submit.prevent="validation"는 폼 제출 이벤트가 발생했을 때, 기본 HTML 폼 제출 동작을 방지하고(prevent), 
    대신 Livewire 컴포넌트의 validation 메서드를 호출.
    --}}
    <form wire:submit.prevent="validation">
        <input type="text" wire:model="name">
        @error('name')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br/>
        <input type="text" wire:model="email">
        @error('email')
            <div style="color:red;">{{ $message }}</div>
        @enderror
        <br/>
        <input type="password" wire:model="password">
        <br/>
        <button type="submit">Submit</button>
    </form>
</div>
{{-- Livewire 컴포넌트에서 HTML 주석이 그대로 노출되는 것을 방지하려면 블레이드 주석을 사용해야함
    블레이드 주석은 서버 측에서만 존재하며, 최종 HTML 결과물에는 포함되지 않음.--}}
    {{--  --}}