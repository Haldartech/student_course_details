<?php
$status = request()->segment(2);
?>
<div class="aside-menu flex-column-fluid">
  <!--begin::Aside Menu-->
  <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">

        {{-- Dashboard --}}
      <div class="menu-item menu-active-bg">
        <a class="menu-link {{($status=='dashboard')?'active':''}}" href="{{url("/admin/dashboard")}}">
          <span class="menu-icon">
            <i class="fa fa-th"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </div>

      {{-- COURSE MANAGEMENT --}}
      <div class="menu-item">
        <div class="menu-content pt-5 pb-2" >
            <span class="menu-section text-uppercase fs-8 ls-1" style="color: rgba(230, 230, 230, 0.877) !important;">COURSE MANAGER</span>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{($status=='list-course' || $status=='add-course' || $status=='edit-course')?'here show':''}}">
        <span class="menu-link">
          <span class="menu-icon">
            <i class="fa-solid fa-book"></i>
          </span>
        <span class="menu-title">COURSE MANAGER</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">

            <div class="menu-item">
                <a class="menu-link {{($status=='list-course' || $status=='add-course' || $status=='edit-course')?'active':''}}" href="{{url("/admin/list-course")}}">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title"> Course </span>
                </a>
            </div>

        </div>
    </div>

    {{-- STUDENT MANAGEMENT --}}
    <div class="menu-item">
        <div class="menu-content pt-5 pb-2" >
            <span class="menu-section text-uppercase fs-8 ls-1" style="color: rgba(230, 230, 230, 0.877) !important;">STUDENT MANAGER</span>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{($status=='list-student' || $status=='add-student' || $status=='edit-student')?'here show':''}}">
        <span class="menu-link">
          <span class="menu-icon">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
          </span>
        <span class="menu-title">STUDENT MANAGER</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">

            <div class="menu-item">
                <a class="menu-link {{($status=='list-student' || $status=='add-student' || $status=='edit-student')?'active':''}}" href="{{url("/admin/list-student")}}">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title"> Student </span>
                </a>
            </div>

        </div>
    </div>

    {{-- FACULTY MANAGEMENT --}}
    <div class="menu-item">
        <div class="menu-content pt-5 pb-2" >
            <span class="menu-section text-uppercase fs-8 ls-1" style="color: rgba(230, 230, 230, 0.877) !important;">FACULTY MANAGER</span>
        </div>
    </div>
    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{($status=='list-faculty' || $status=='add-faculty' || $status=='edit-faculty')?'here show':''}}">
        <span class="menu-link">
          <span class="menu-icon">
            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
          </span>
        <span class="menu-title">FACULTY MANAGER</span>
            <span class="menu-arrow"></span>
        </span>

        <div class="menu-sub menu-sub-accordion menu-active-bg">

            <div class="menu-item">
                <a class="menu-link {{($status=='list-faculty' || $status=='add-faculty' || $status=='edit-faculty')?'active':''}}" href="{{url("/admin/list-faculty")}}">
                  <span class="menu-bullet">
                    <span class="bullet bullet-dot"></span>
                  </span>
                  <span class="menu-title"> Faculty </span>
                </a>
            </div>

        </div>
    </div>


</div>

    </div>
    <!--end::Menu-->
  </div>
  <!--end::Aside Menu-->
</div>
