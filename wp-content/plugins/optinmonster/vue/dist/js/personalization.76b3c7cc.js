"use strict";(self["webpackChunkoptinmonster_wordpress_plugin_vue_app"]=self["webpackChunkoptinmonster_wordpress_plugin_vue_app"]||[]).push([[415],{81223:function(e,t,a){a.r(t),a.d(t,{default:function(){return h}});var s=function(){var e=this,t=e._self._c;return t("core-page",[t("div",{staticClass:"omapi-personalization"},[t("div",{staticClass:"omapi-personalization__filters"},[t("div",{staticClass:"omapi-personalization__nav flex"},[e._l(e.categories,(function(a){return t("a",{key:a.slug,staticClass:"omapi-personalization__filter nohover",class:{"omapi-personalization__filter-active":!e.search&&e.filter===a.slug},on:{click:function(t){return e.updateFilter(a.slug)}}},[e._v(" "+e._s(a.displayName)+" ")])})),t("a",{staticClass:"omapi-personalization__filter nohover",class:{"omapi-personalization__filter-active":e.allFilters},on:{click:function(t){e.filter=""}}},[e._v("All")])],2),t("div",{staticClass:"omapi-personalization__search campaign-type-filter__search"},[t("input",{staticClass:"omapi-input",attrs:{placeholder:"Search...",type:"text"},domProps:{value:e.search},on:{input:e.updateSearch,keydown:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"esc",27,t.key,["Esc","Escape"])?null:e.clearSearch.apply(null,arguments)}}}),e.search?t("svg-times",{staticClass:"clear-search",on:{click:e.clearSearch}}):e._e()],1)]),t("common-alerts",{attrs:{id:"om-plugin-alerts",alerts:e.alerts}}),e.isLoading?t("core-loading",[t("h1",[e._v("Loading...")])]):t("personalization-rules",{attrs:{categories:e.categories,filter:e.filter,search:e.search},on:{clearSearch:e.clearSearch}})],1)])},r=[],i=a(86080),l=a(55916),n=a(20629),o={data:function(){return{filter:"popular",search:"",categories:[{slug:"popular",displayName:"Popular",order:1},{slug:"behavior",displayName:"Who (Personalization)",order:2},{slug:"timing",displayName:"When (Triggers)",order:3},{slug:"triggers",displayName:"Where (Targeting)",order:4},{slug:"retargeting",displayName:"OnSite Retargeting",order:5},{slug:"ecommerce",displayName:"Ecommerce",order:6}]}},computed:{isLoading:function(){return!this.$store.getters.isFetched("rulesetData")},alerts:function(){var e=(0,l.Z)(this.$get("$store.state.alerts",[]));return e.concat(this.$get("$store.state.campaigns.alerts",[]))},allFilters:function(){return this.search||!this.filter}},mounted:function(){this.$store.getters.shouldFetchUser?(this.$bus.$on("fetchedMe",this.fetchRulesetData),this.fetchMe()):this.fetchRulesetData()},beforeDestroy:function(){this.$bus.$off("fetchedMe",this.fetchRulesetData)},methods:(0,i.Z)((0,i.Z)((0,i.Z)({},(0,n.nv)(["fetchMe"])),(0,n.nv)("campaigns",["fetchRulesetData"])),{},{updateFilter:function(e){this.filter=e,this.search=""},clearSearch:function(){this.search=""},updateSearch:function(e){this.search=e.target.value}})},c=o,u=a(1001),p=(0,u.Z)(c,s,r,!1,null,null,null),h=p.exports}}]);
//# sourceMappingURL=personalization.76b3c7cc.js.map