var tribe_events_bar_action;!function(a,b,c,d,e,f,g,h,i){c(b).ready(function(){function i(a){if(!a.parents(".tribe-bar-disabled").length){var b=a.width();b>800?a.removeClass("tribe-bar-mini tribe-bar-collapse").addClass("tribe-bar-full"):a.removeClass("tribe-bar-full").addClass("tribe-bar-mini"),728>b?a.removeClass("tribe-bar-mini").addClass("tribe-bar-collapse"):a.removeClass("tribe-bar-collapse")}}function j(){if(tribe_events_bar_action="change_view","month"===g.view&&l.length){var b=l.val(),d=f.get_day();"0"!==g.datepicker_format?d.length?(b=tribeDateFormat(l.bootstrapDatepicker("getDate"),"tribeMonthQuery"),l.val(b+d)):l.val(""):7===b.length&&l.val(b+d)}g.url_params={},c(e).trigger("tribe_ev_preCollectBarParams"),c("#tribe-bar-form input, #tribe-bar-form select").each(function(){var a=c(this);a.val().length&&!a.hasClass("tribe-no-param")&&("month"!==g.view&&"0"!==g.datepicker_format&&a.is(l)?g.url_params[a.attr("name")]=tribeDateFormat(a.bootstrapDatepicker("getDate"),"tribeQuery"):a.is(":checkbox")?a.is(":checked")&&(g.url_params[a.attr("name")]=a.val()):g.url_params[a.attr("name")]=a.val())}),g.url_params=c.param(g.url_params),c(e).trigger("tribe_ev_postCollectBarParams"),g.url_params.length&&(g.cur_url+=h.starting_delim()+g.url_params),a.location.href=g.cur_url}var k=c("#tribe-bar-form"),l=c("#tribe-bar-date"),m=(c("#tribe-events"),c("#tribe-events-header")),n=0,o=c("select[name=tribe-bar-view]");if(m.length&&(n=m.data("startofweek")),i(k),k.resize(function(){i(k)}),!c(".tribe-events-week-grid").length&&"month"!==g.view){var p="yyyy-mm-dd";if("0"!==g.datepicker_format){p=d.datepicker_formats.main[g.datepicker_format];var q=f.get_url_param("tribe-bar-date");q?l.val(tribeDateFormat(q,g.datepicker_format)):"day"===g.view&&0!==l.val().length&&l.val(tribeDateFormat(l.val(),g.datepicker_format))}d.datepicker_opts={weekStart:n,format:p,autoclose:!0},l.bootstrapDatepicker(d.datepicker_opts)}l.blur(function(){""===l.val()&&c(".datepicker.dropdown-menu").is(":hidden")&&h.live_ajax()&&h.pushstate&&(g.date=d.cur_date,d.cur_url=d.base_url,c(e).trigger("tribe_ev_runAjax"))}),c(".tribe-bar-settings").length&&c("#tribe-events-bar").addClass("tribe-has-settings"),c("#tribe-events-bar .hasDatepicker").length&&c("#tribe-events-bar").addClass("tribe-has-datepicker"),c('input[name*="tribe-bar-"]').placeholder(),c('<ul class="tribe-bar-views-list" />').insertAfter(o);var r=c(".tribe-bar-views-list");o.find("option").each(function(a){var b=c(this);displaying=b.data("view");var d="tribe-bar-views-option-"+b.data("view");c("<li></li>",{"class":"tribe-bar-views-option "+d,"data-tribe-bar-order":a,"data-view":displaying}).html(['   <a href="#">','   <span class="tribe-icon-'+displaying+'">'+b.text()+"</span>","</a>"].join("")).appendTo(".tribe-bar-views-list")});var s=o.find(":selected").data("view"),t=r.find("li[data-view="+s+"]");t.prependTo(r).addClass("tribe-bar-active"),k.on("click","#tribe-bar-views",function(a){a.stopPropagation();var b=c(this);b.toggleClass("tribe-bar-views-open")}),k.on("click",".tribe-bar-views-option",function(a){a.preventDefault();var b=c(this);if(!b.is(".tribe-bar-active")){var d=b.data("view");g.cur_url=c("option[data-view="+d+"]").val(),g.view_target=c('select[name=tribe-bar-view] option[value="'+g.cur_url+'"]').data("view"),tribe_events_bar_action="change_view",j()}}),k.on("change",".tribe-bar-views-select",function(a){a.preventDefault();var b=c("option:selected",this),d=b.data("view");g.cur_url=c("option[data-view="+d+"]").val(),g.view_target=c('select[name=tribe-bar-view] option[value="'+g.cur_url+'"]').data("view"),tribe_events_bar_action="change_view",j()}),k.on("click","#tribe-bar-collapse-toggle",function(){c(this).toggleClass("tribe-bar-filters-open"),c(".tribe-bar-filters").slideToggle("fast")}),c('label[for="tribe-bar-date"], input[name="tribe-bar-date"]').wrapAll('<div id="tribe-bar-dates" />'),c("#tribe-bar-filters").before(c("#tribe-bar-dates")),c(e).on("tribe_ev_serializeBar",function(){c("form#tribe-bar-form input, form#tribe-bar-form select, #tribeHideRecurrence").each(function(){var a=c(this);a.is("#tribe-bar-date")&&(a.val().length?"month"===g.view?(g.params[a.attr("name")]=tribeDateFormat(g.mdate,"tribeMonthQuery"),g.url_params[a.attr("name")]=tribeDateFormat(g.mdate,"tribeMonthQuery")):(g.params[a.attr("name")]=tribeDateFormat(a.bootstrapDatepicker("getDate"),"tribeQuery"),g.url_params[a.attr("name")]=tribeDateFormat(a.bootstrapDatepicker("getDate"),"tribeQuery")):a.is(".placeholder")&&a.is(".bd-updated")?g.url_params[a.attr("name")]=a.attr("data-oldDate"):g.date=d.cur_date),!a.val().length||a.hasClass("tribe-no-param")||a.is("#tribe-bar-date")||(a.is(":checkbox")?a.is(":checked")&&(g.params[a.attr("name")]=a.val(),"map"!==g.view&&(g.url_params[a.attr("name")]=a.val()),("month"===g.view||"day"===g.view||"week"===g.view||g.recurrence)&&g.pushcount++):(g.params[a.attr("name")]=a.val(),"map"!==g.view&&(g.url_params[a.attr("name")]=a.val()),("month"===g.view||"day"===g.view||"week"===g.view)&&g.pushcount++))})});var u=c('#tribe-events-bar [class^="tribe-bar-button-"]'),v=u.next(".tribe-bar-drop-content");u.click(function(){var a=c(this);return a.toggleClass("open"),a.next(".tribe-bar-drop-content").toggle(),!1}),c(b).click(function(){c("#tribe-bar-views").removeClass("tribe-bar-views-open"),u.hasClass("open")&&(u.removeClass("open"),v.hide())}),v.click(function(a){a.stopPropagation()})})}(window,document,jQuery,tribe_ev.data,tribe_ev.events,tribe_ev.fn,tribe_ev.state,tribe_ev.tests,tribe_debug);