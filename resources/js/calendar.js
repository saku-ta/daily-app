import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import axios from 'axios';
import {Tooltip} from 'bootstrap';

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,listWeek",
    },
    locale: "ja",

    // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    
    
    
    events: function (info, successCallback, failureCallback) {
        // Laravelのイベント取得処理の呼び出し
        axios
            .post("/posts/post-get", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
                
            })
            .then((response) => {
                
                // 追加したイベントを削除
                calendar.removeAllEvents();
                console.log('ok');
                // カレンダーに読み込み
                successCallback(response.data);
                
                //console.log(typeof response.data);
            })
            .catch((error) => {
                if(axios.isAxiosError(error)){
                    console.log('status: ', error.response?.status);
                    console.log('error code: ', error.response?.data.errorCode);
                }
                console.log(error.message);
                failureCallback(error);
            });
    },
    eventDidMount: function(info){
        
        var tooltip = new Tooltip(info.el, {
            title: info.event.extendedProps.description,
            placement: 'top',
            trigger: 'hover',
            container: 'body',
            
            
        });
        console.log('This is');
    }
});
calendar.render();