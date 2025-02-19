<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 border border-indigo-800 rounded-md font-semibold text-xs text-indigo-800 uppercase tracking-widest hover:bg-indigo-100 focus:bg-indigo-100 active:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
   {{ $slot }}
</button>