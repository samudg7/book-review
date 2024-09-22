@extends('layouts.app')

@if ($errors->any())
    {{--<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>--}}
{{--
    <x-alert type="error" :message="session('error')" />
--}}

    <v-alert
        v-model="alert"
        border="start"
        close-label="Close Alert"
        color="deep-purple-accent-4"
        title="Closable Alert"
        variant="tonal"
        closable
    >
        {{ session('error') }}
    </v-alert>

    <div
        v-if="!alert"
        class="text-center"
    >
        <v-btn @click="alert = true">
            Reset
        </v-btn>
    </div>
    <script>
        export default {
            data: () => ({
                alert: true,
            }),
        }
    </script>

@endif

@if (session('success'))
    {{--<div class="alert alert-success">
        {{ session('success') }}
    </div>--}}
    <x-alert type="success" :message="session('success')" />

@endif

@if (session('error'))
    {{--<div class="alert alert-danger">
        {{ session('error') }}
    </div>--}}
    {{--<x-alert type="error" :message="session('error')" />--}}
            <v-alert
                v-model="alert"
                border="start"
                close-label="Close Alert"
                color="deep-purple-accent-4"
                title="Closable Alert"
                variant="tonal"
                closable
            >
                {{ session('error') }}
            </v-alert>

            <div
                v-if="!alert"
                class="text-center"
            >
                <v-btn @click="alert = true">
                    Reset
                </v-btn>
            </div>
    <script>
        export default {
            data: () => ({
                alert: true,
            }),
        }
    </script>
@endif

<!-- Your form and other content here -->

@section('content')
  <h1 class="mb-10 text-2xl">Add Review for {{ $book->title }}</h1>

  <form method="POST" action="{{ route('books.reviews.store', $book) }}">
    @csrf
    <label for="review">Review</label>
    <textarea name="review" id="review" required class="input mb-4"></textarea>

    <label for="rating">Rating</label>

    <select name="rating" id="rating" class="input mb-4" required>
      <option value="">Select a Rating</option>
      @for ($i = 1; $i <= 5; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
      @endfor
    </select>

    <button type="submit" class="btn">Add Review</button>
  </form>
@endsection
