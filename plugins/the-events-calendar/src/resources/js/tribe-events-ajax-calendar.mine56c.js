!function(a,b,c,d,e,f,g,h,i,j){c(b).ready(function(){function j(a){var b=c('.tribe-mobile-day[data-day="'+a+'"]'),d=c('.tribe-events-calendar td[data-day="'+a+'"]'),e=d.find(".tribe-events-viewmore"),f=d.find(".hentry");f.length&&(f.each(function(){var a=c(this);if(a.tribe_has_attr("data-tribejson")){var d=a.data("tribejson");b.append(tribe_tmpl("tribe_tmpl_month_mobile",d))}}),e.length&&b.append(e.clone()))}function k(a){var b=a.data("tribejson");b.date=a.attr("data-day");var c=a.parents(".tribe-events-calendar"),d=c.next("#tribe-mobile-container"),e=d.find(".tribe-mobile-day"),f=c.find(".mobile-trigger"),g='[data-day="'+b.date+'"]',h=e.filter(g);b.has_events=a.hasClass("tribe-events-has-events"),f.removeClass("mobile-active").filter(g).addClass("mobile-active"),e.hide(),h.length?h.show():(d.append(tribe_tmpl("tribe_tmpl_month_mobile_day_header",b)),j(b.date))}function l(){var a=t.find(".tribe-events-present"),b=t.find(".mobile-trigger"),d=t.find("#tribe-events-content > .tribe-events-calendar");if(c("#tribe-mobile-container").length||c('<div id="tribe-mobile-container" />').insertAfter(d),a.length&&a.is(".tribe-events-thismonth"))k(a);else{var e=b.filter(".tribe-events-thismonth").first();k(e)}}function m(){t.find(".tribe-events-calendar th").each(function(){var a=c(this),b=a.attr("data-day-abbr"),d=a.attr("title");q.is(".tribe-mobile")?a.text(b):a.text(d)})}function n(a){q.is(".tribe-mobile")?(m(),l()):a&&m()}function o(a){if("change_view"!=tribe_events_bar_action){if(a.preventDefault(),g.ajax_running)return;u.val().length?"0"!==g.datepicker_format?g.date=tribeDateFormat(u.bootstrapDatepicker("getDate"),"tribeMonthQuery"):g.date=u.val():v||(g.date=d.cur_date.slice(0,-3)),g.filter_cats?d.cur_url=c("#tribe-events-header").data("baseurl")+g.date+"/":d.default_permalinks?d.cur_url=w:d.cur_url=w+g.date+"/",g.popping=!1,f.pre_ajax(function(){p()})}}function p(){f.invalid_date(g.date)||(c(".tribe-events-calendar").tribe_spin(),g.pushcount=0,g.ajax_running=!0,g.popping||(g.params={action:"tribe_calendar",eventDate:g.date},g.category&&(g.params.tribe_event_category=g.category),g.url_params={},d.default_permalinks&&(g.url_params.hasOwnProperty("post_type")||(g.url_params.post_type=i.events_post_type),g.url_params.hasOwnProperty("eventDisplay")||(g.url_params.eventDisplay=g.view)),c(e).trigger("tribe_ev_serializeBar"),g.params=c.param(g.params),g.url_params=c.param(g.url_params),c(e).trigger("tribe_ev_collectParams"),g.pushcount>0||g.filters||d.default_permalinks?(g.do_string=!0,g.pushstate=!1):(g.do_string=!1,g.pushstate=!0)),h.pushstate&&!g.filter_cats?(c(e).trigger("tribe_ev_ajaxStart").trigger("tribe_ev_monthView_AjaxStart"),c.post(TribeCalendar.ajaxurl,g.params,function(a){if(g.initial_load=!1,f.enable_inputs("#tribe_events_filters_form","input, select"),a.success){g.ajax_running=!1,d.ajax_response={total_count:"",view:a.view,max_pages:"",tribe_paged:"",timestamp:(new Date).getTime()};var h="";h=c.isFunction(c.fn.parseHTML)?c.parseHTML(a.html):a.html,c("#tribe-events-content").replaceWith(h),n(!0),g.page_title=c("#tribe-events-header").data("title"),b.title=g.page_title,g.do_string&&(d.cur_url=d.cur_url+"?"+g.url_params,history.pushState({tribe_date:g.date,tribe_params:g.params},g.page_title,d.cur_url)),g.pushstate&&history.pushState({tribe_date:g.date,tribe_params:g.params},g.page_title,d.cur_url),c(e).trigger("tribe_ev_ajaxSuccess").trigger("tribe_ev_monthView_ajaxSuccess")}})):g.url_params.length?a.location=d.cur_url+"?"+g.url_params:a.location=d.cur_url)}var q=c("body"),r=c('[class^="tribe-events-nav-"] a'),s=f.get_url_param("tribe-bar-date"),t=c("#tribe-events"),u=c("#tribe-bar-date"),v=!1,w="/";"undefined"!=typeof i.events_base?w=i.events_base:r.length&&(w=r.first().attr("href").slice(0,-8)),d.default_permalinks&&(w=w.split("?")[0]),c(".tribe-events-calendar").length&&c("#tribe-events-bar").length&&s&&s.length>7&&(c("#tribe-bar-date-day").val(s.slice(-3)),u.val(s.substring(0,7)));var x="yyyy-mm";if("0"!==g.datepicker_format){var y=parseInt(g.datepicker_format),z="m"+g.datepicker_format.toString();x=d.datepicker_formats.month[y],s&&(s.length<=7&&(s+="-01"),u.val(tribeDateFormat(s,z)))}if(d.datepicker_opts={format:x,minViewMode:"months",autoclose:!0},u.bootstrapDatepicker(d.datepicker_opts).on("changeDate",function(a){g.mdate=a.date;var b=a.date.getFullYear(),e=("0"+(a.date.getMonth()+1)).slice(-2);if(v=!0,g.date=b+"-"+e,h.no_bar()||h.live_ajax()&&h.pushstate){if(g.ajax_running||g.updating_picker)return;g.filter_cats?d.cur_url=c("#tribe-events-header").data("baseurl")+g.date+"/":d.default_permalinks?d.cur_url=w:d.cur_url=w+g.date+"/",g.popping=!1,f.pre_ajax(function(){p()})}}),n(!0),c(e).on("tribe_ev_resizeComplete",function(){n(!0)}),h.pushstate&&!h.map_view()){var A="action=tribe_calendar&eventDate="+c("#tribe-events-header").data("date");d.params.length&&(A=A+"&"+d.params),g.category&&(A=A+"&tribe_event_category="+g.category),history.replaceState({tribe_params:A},g.page_title,location.href),c(a).on("popstate",function(a){var b=a.originalEvent.state;b&&(g.do_string=!1,g.pushstate=!1,g.popping=!0,g.params=b.tribe_params,f.pre_ajax(function(){p()}),f.set_form(g.params))})}c("#tribe-events").on("click",".tribe-events-nav-previous, .tribe-events-nav-next",function(a){if(a.preventDefault(),!g.ajax_running){var b=c(this).find("a");g.date=b.data("month"),g.mdate=g.date+"-01","0"!==g.datepicker_format?f.update_picker(tribeDateFormat(g.mdate,z)):f.update_picker(g.date),g.filter_cats?d.cur_url=c("#tribe-events-header").data("baseurl"):d.cur_url=b.attr("href"),d.default_permalinks&&(d.cur_url=d.cur_url.split("?")[0]),g.popping=!1,f.pre_ajax(function(){p()})}}).on("click","td.tribe-events-thismonth a",function(a){a.stopPropagation()}).on("click",'[id*="tribe-events-daynum-"] a',function(a){if(q.is(".tribe-mobile")){a.preventDefault();var b=c(this).closest(".mobile-trigger");k(b)}}).on("click",".mobile-trigger",function(a){q.is(".tribe-mobile")&&(a.preventDefault(),a.stopPropagation(),k(c(this)))}),f.snap("#tribe-bar-form","body","#tribe-events-footer .tribe-events-nav-previous, #tribe-events-footer .tribe-events-nav-next"),c("form#tribe-bar-form").on("submit",function(a){o(a)}),c(e).on("tribe_ev_runAjax",function(){p()}),c(e).on("tribe_ev_updatingRecurrence",function(){g.date=c("#tribe-events-header").data("date"),g.filter_cats?d.cur_url=c("#tribe-events-header").data("baseurl")+g.date+"/":d.default_permalinks?d.cur_url=w:d.cur_url=w+g.date+"/",g.popping=!1})})}(window,document,jQuery,tribe_ev.data,tribe_ev.events,tribe_ev.fn,tribe_ev.state,tribe_ev.tests,tribe_js_config,tribe_debug);