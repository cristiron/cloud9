@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages" :text="exempl"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMsg"
                        :user="{{Auth::user()}}"
                    ></chat-form>
                </div>
                
                <span v-for ="x in messages">@{{x}}<br></span>
                
                
            </div>
        </div>
    </div>
</div>
@endsection