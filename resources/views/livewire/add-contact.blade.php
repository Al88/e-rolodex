
<div class="mx-auto sm:px-6">
    <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 sm:text-left">
            <div class="flex items-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path></svg>
                <a href="/" class="ml-1 underline">
                    Back to Contact list
                </a>
            </div>
        </div>
    </div>
    <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center mb-6">
                    <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    <div class="ml-4 text-lg leading-7 font-semibold">Add a contact</div>
                </div>

                <div class="ml-12">
                    <form class="w-full max-w-lg"  wire:submit.prevent="submit">
                        <div class="flex flex-wrap -mx-3">
                          <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="firstName">
                              First Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border @error('firstName') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="firstName" type="text"  wire:model="firstName">
                            @error('firstName') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                          </div>
                          <div class="w-full md:w-1/3 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="lastName">
                              Last Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('lastName') border-red-500 @enderror  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="lastName" type="text"  wire:model="lastName">
                            @error('lastName') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                          </div>
                          <div class="w-full md:w-1/3 px-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="middleName">
                              Middle Name
                            </label>
                            <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('middleName') border-red-500 @enderror  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="middleName" type="text"  wire:model="middleName">
                            @error('middleName') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                          </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mt-3" for="prefix">
                                Prefix
                              </label>
                              <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="prefix" wire:model="prefix">
                                  <option value="">Choose</option>
                                  @foreach ($this->getPrefixTypes() as $type)
                                  <option value="{{$type}}">{{$type}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mt-3" for="sufix">
                                Sufix
                              </label>
                              <div class="relative">
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="sufix" wire:model="sufix">
                                    <option value="">Choose</option>
                                    @foreach ($this->getSufixTypes() as $type)
                                  <option value="{{$type}}">{{$type}}</option>
                                  @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                  <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                </div>
                              </div>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mt-3" for="title">
                                Title
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="title" type="text"  wire:model="title">
                            </div>
                          </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3 mb-6 md:mb-0">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold" for="email">
                                Email
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('email') border-red-500 @enderror  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="email" type="text"  wire:model="email">
                              @error('email') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>

                            <div class="w-full md:w-1/2 px-3">
                              <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-3" for="defaultPhoneNumber">
                                Default phone number
                              </label>
                              <input class="appearance-none block w-full bg-gray-200 text-gray-700 border  @error('defaultPhoneNumber') border-red-500 @enderror  rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white" id="defaultPhoneNumber" type="text"  wire:model="defaultPhoneNumber">
                              @error('defaultPhoneNumber') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-3" for="phoneType">
                                  Phone type
                                </label>
                                <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phoneType" wire:model="phoneType">
                                    <option value="">Choose</option>
                                    @foreach ($this->getPhoneTypes() as $type)
                                    <option value="{{$type}}">{{$type}}</option>
                                    @endforeach
                                  </select>
                                @error('phoneType') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                            </div>
                          </div>

                          <div class="md:flex md:items-center">
                            <div class="md:w-2/3">
                              <button class="shadow bg-emerald-500 hover:bg-emerald-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Add
                              </button>
                            </div>
                          </div>

                      </form>

                </div>
            </div>

        </div>
    </div>


</div>

<div>

</div>
