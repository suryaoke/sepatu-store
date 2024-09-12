     @extends('backend.admin_master')
     @section('backend')
         <div class="grid grid-cols-12 gap-6">
             <div class="col-span-12 2xl:col-span-9">
                 <div class="grid grid-cols-12 gap-6">
                     <!-- BEGIN: Notification -->
                     <div class="col-span-12 mt-6 -mb-6 intro-y">
                         <div class="alert alert-dismissible show box bg-primary text-white flex items-center mb-6"
                             role="alert">
                             <span>Silahkan gunakan aplikasi dengan sebaik-baiknya, dan jaga kerahasiaan email dan password
                                 Anda..!!!</span>
                             <button type="button" class="btn-close text-white" data-tw-dismiss="alert" aria-label="Close">
                                 <i data-lucide="x" class="w-4 h-4"></i> </button>
                         </div>
                     </div>
                     <!-- BEGIN: Notification -->
                     <!-- BEGIN: General Report -->
                     <div class="col-span-12 lg:col-span-8 xl:col-span-6 mt-2">
                         <div class="intro-y block sm:flex items-center h-10">
                             <h2 class="text-lg font-medium truncate mr-5">
                                 General Report
                             </h2>
                             <select class="sm:ml-auto mt-3 sm:mt-0 sm:w-auto form-select box">
                                 <option value="daily">Daily</option>
                                 <option value="weekly">Weekly</option>
                                 <option value="monthly">Monthly</option>
                                 <option value="yearly">Yearly</option>
                                 <option value="custom-date">Custom Date</option>
                             </select>
                         </div>
                         <div class="report-box-2 intro-y mt-12 sm:mt-5">
                             <div class="box sm:flex">
                                 <div class="px-8 py-12 flex flex-col justify-center flex-1">
                                     <i data-lucide="shopping-bag" class="w-10 h-10 text-warning"></i>
                                     <div class="relative text-3xl font-medium mt-12 pl-4 ml-0.5"> <span
                                             class="absolute text-2xl font-medium top-0 left-0 -ml-0.5">$</span>
                                         54.143 </div>
                                     <div class="report-box-2__indicator bg-success tooltip cursor-pointer"
                                         title="47% Higher than last month"> 47% <i data-lucide="chevron-up"
                                             class="w-4 h-4 ml-0.5"></i> </div>
                                     <div class="mt-4 text-slate-500">Sales earnings this month after
                                         associated author fees, & before taxes.</div>
                                     <button class="btn btn-outline-secondary relative justify-start rounded-full mt-12">
                                         Download Reports
                                         <span
                                             class="w-8 h-8 absolute flex justify-center items-center bg-primary text-white rounded-full right-0 top-0 bottom-0 my-auto ml-auto mr-0.5">
                                             <i data-lucide="arrow-right" class="w-4 h-4"></i> </span>
                                     </button>
                                 </div>
                                 <div
                                     class="px-8 py-12 flex flex-col justify-center flex-1 border-t sm:border-t-0 sm:border-l border-slate-200 dark:border-darkmode-300 border-dashed">
                                     <div class="text-slate-500 text-xs">TOTAL TRANSACTION</div>
                                     <div class="mt-1.5 flex items-center">
                                         <div class="text-base">4.501</div>
                                         <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2"
                                             title="2% Lower than last month"> 2% <i data-lucide="chevron-down"
                                                 class="w-4 h-4 ml-0.5"></i>
                                         </div>
                                     </div>
                                     <div class="text-slate-500 text-xs mt-5">CANCELATION CASE</div>
                                     <div class="mt-1.5 flex items-center">
                                         <div class="text-base">2</div>
                                         <div class="text-danger flex text-xs font-medium tooltip cursor-pointer ml-2"
                                             title="0.1% Lower than last month"> 0.1% <i data-lucide="chevron-down"
                                                 class="w-4 h-4 ml-0.5"></i>
                                         </div>
                                     </div>
                                     <div class="text-slate-500 text-xs mt-5">GROSS RENTAL VALUE</div>
                                     <div class="mt-1.5 flex items-center">
                                         <div class="text-base">$72.000</div>
                                         <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                                             title="49% Higher than last month"> 49% <i data-lucide="chevron-up"
                                                 class="w-4 h-4 ml-0.5"></i> </div>
                                     </div>
                                     <div class="text-slate-500 text-xs mt-5">GROSS RENTAL PROFIT</div>
                                     <div class="mt-1.5 flex items-center">
                                         <div class="text-base">$54.000</div>
                                         <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                                             title="52% Higher than last month"> 52% <i data-lucide="chevron-up"
                                                 class="w-4 h-4 ml-0.5"></i> </div>
                                     </div>
                                     <div class="text-slate-500 text-xs mt-5">NEW USERS</div>
                                     <div class="mt-1.5 flex items-center">
                                         <div class="text-base">2.500</div>
                                         <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-2"
                                             title="52% Higher than last month"> 52% <i data-lucide="chevron-up"
                                                 class="w-4 h-4 ml-0.5"></i> </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <!-- END: General Report -->
                     <!-- BEGIN: Visitors -->
                     <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2">
                         <div class="intro-y flex items-center h-10">
                             <h2 class="text-lg font-medium truncate mr-5">
                                 Visitors
                             </h2>
                             <a href="" class="ml-auto text-primary truncate">View on Map</a>
                         </div>
                         <div class="report-box-2 intro-y mt-5">
                             <div class="box p-5">
                                 <div class="flex items-center">
                                     Realtime active users
                                     <div class="dropdown ml-auto">
                                         <a class="dropdown-toggle w-5 h-5 block -mr-2" href="javascript:;"
                                             aria-expanded="false" data-tw-toggle="dropdown"> <i data-lucide="more-vertical"
                                                 class="w-5 h-5 text-slate-500"></i> </a>
                                         <div class="dropdown-menu w-40">
                                             <ul class="dropdown-content">
                                                 <li>
                                                     <a href="" class="dropdown-item"> <i data-lucide="file-text"
                                                             class="w-4 h-4 mr-2"></i> Export </a>
                                                 </li>
                                                 <li>
                                                     <a href="" class="dropdown-item"> <i data-lucide="settings"
                                                             class="w-4 h-4 mr-2"></i>
                                                         Settings </a>
                                                 </li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="text-2xl font-medium mt-2">214</div>
                                 <div class="border-b border-slate-200 flex pb-2 mt-4">
                                     <div class="text-slate-500 text-xs">Page views per second</div>
                                     <div class="text-success flex text-xs font-medium tooltip cursor-pointer ml-auto"
                                         title="49% Lower than last month"> 49% <i data-lucide="chevron-up"
                                             class="w-4 h-4 ml-0.5"></i> </div>
                                 </div>
                                 <div class="mt-2 border-b broder-slate-200">
                                     <div class="-mb-1.5 -ml-2.5">
                                         <div class="h-[79px]">
                                             <canvas id="report-bar-chart"></canvas>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="text-slate-500 text-xs border-b border-slate-200 flex mb-2 pb-2 mt-4">
                                     <div>Top Active Pages</div>
                                     <div class="ml-auto">Active Users</div>
                                 </div>
                                 <div class="flex">
                                     <div>/letz-lara…review/2653</div>
                                     <div class="ml-auto">472</div>
                                 </div>
                                 <div class="flex mt-1.5">
                                     <div>/midone…review/1674</div>
                                     <div class="ml-auto">294</div>
                                 </div>
                                 <div class="flex mt-1.5">
                                     <div>/profile…review/46789</div>
                                     <div class="ml-auto">83</div>
                                 </div>
                                 <div class="flex mt-1.5">
                                     <div>/profile…review/24357</div>
                                     <div class="ml-auto">21</div>
                                 </div>
                                 <button class="btn btn-outline-secondary border-dashed w-full py-1 px-2 mt-4">Real-Time
                                     Report</button>
                             </div>
                         </div>
                     </div>
                     <!-- END: Visitors -->
                     <!-- BEGIN: Users By Age -->
                     <div class="col-span-12 sm:col-span-6 lg:col-span-4 xl:col-span-3 mt-2 lg:mt-6 xl:mt-2">
                         <div class="intro-y flex items-center h-10">
                             <h2 class="text-lg font-medium truncate mr-5">
                                 Users By Age
                             </h2>
                             <a href="" class="ml-auto text-primary truncate">Show More</a>
                         </div>
                         <div class="report-box-2 intro-y mt-5">
                             <div class="box p-5">
                                 <ul class=" nav nav-pills w-4/5 bg-slate-100 dark:bg-black/20 rounded-md mx-auto "
                                     role="tablist">
                                     <li id="active-users-tab" class="nav-item flex-1" role="presentation">
                                         <button class="nav-link w-full py-1.5 px-2 active" data-tw-toggle="pill"
                                             data-tw-target="#active-users" type="button" role="tab"
                                             aria-controls="active-users" aria-selected="true"> Active </button>
                                     </li>
                                     <li id="inactive-users-tab" class="nav-item flex-1" role="presentation">
                                         <button class="nav-link w-full py-1.5 px-2" data-tw-toggle="pill"
                                             data-tw-target="#inactive-users" type="button" role="tab"
                                             aria-selected="false"> Inactive </button>
                                     </li>
                                 </ul>
                                 <div class="tab-content mt-6">
                                     <div class="tab-pane active" id="active-users" role="tabpanel"
                                         aria-labelledby="active-users-tab">
                                         <div class="relative">
                                             <div class="h-[208px]">
                                                 <canvas class="mt-3" id="report-donut-chart"></canvas>
                                             </div>
                                             <div
                                                 class="flex flex-col justify-center items-center absolute w-full h-full top-0 left-0">
                                                 <div class="text-2xl font-medium">2.501</div>
                                                 <div class="text-slate-500 mt-0.5">Active Users</div>
                                             </div>
                                         </div>
                                         <div class="w-52 sm:w-auto mx-auto mt-5">
                                             <div class="flex items-center">
                                                 <div class="w-2 h-2 bg-primary rounded-full mr-3"></div>
                                                 <span class="truncate">17 - 30 Years old</span> <span
                                                     class="font-medium ml-auto">62%</span>
                                             </div>
                                             <div class="flex items-center mt-4">
                                                 <div class="w-2 h-2 bg-pending rounded-full mr-3"></div>
                                                 <span class="truncate">31 - 50 Years old</span> <span
                                                     class="font-medium ml-auto">33%</span>
                                             </div>
                                             <div class="flex items-center mt-4">
                                                 <div class="w-2 h-2 bg-warning rounded-full mr-3"></div>
                                                 <span class="truncate">>= 50 Years old</span> <span
                                                     class="font-medium ml-auto">10%</span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>

                 </div>
             </div>

         </div>
     @endsection
