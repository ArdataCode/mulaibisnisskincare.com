(()=>{"use strict";var e={n:a=>{var l=a&&a.__esModule?()=>a.default:()=>a;return e.d(l,{a:l}),l},d:(a,l)=>{for(var t in l)e.o(l,t)&&!e.o(a,t)&&Object.defineProperty(a,t,{enumerable:!0,get:l[t]})},o:(e,a)=>Object.prototype.hasOwnProperty.call(e,a)};const a=window.React,l=window.wp.element,t=window.wp.domReady;var n=e.n(t);const r=window.wp.data,o=window.wp.i18n,s=window.wp.components,c=window.wp.keyboardShortcuts,g=window.wp.a11y;function i(e,a,l){const t=e.splice(a,1)[0];return e.splice(l,0,t),e}function u({languages:e,selectedLanguage:l,onMoveUp:t,onMoveDown:n,onRemove:r}){const g=!l||e[0]?.locale===l?.locale,i=!l||e[e.length-1]?.locale===l?.locale,u=!l;return(0,c.useShortcut)("preferred-languages/move-up",(e=>{e.preventDefault(),g||t()})),(0,c.useShortcut)("preferred-languages/move-down",(e=>{e.preventDefault(),i||n()})),(0,c.useShortcut)("preferred-languages/remove",(e=>{e.preventDefault(),u||r()})),(0,a.createElement)("div",{className:"active-locales-controls"},(0,a.createElement)("ul",null,(0,a.createElement)("li",null,(0,a.createElement)(s.Button,{isSecondary:!0,showTooltip:!0,"aria-keyshortcuts":"ArrowUp","aria-label":(0,o.sprintf)(/* translators: accessibility text */
(0,o.__)("Move up (%s)","preferred-languages"),/* translators: keyboard shortcut (Arrow Up) */
(0,o.__)("Up","preferred-languages")),label:/* translators: keyboard shortcut (Arrow Up) */
(0,o.__)("Up","preferred-languages"),disabled:g,onClick:t},(0,o.__)("Move Up","preferred-languages"))),(0,a.createElement)("li",null,(0,a.createElement)(s.Button,{isSecondary:!0,showTooltip:!0,"aria-keyshortcuts":"ArrowDown","aria-label":(0,o.sprintf)(/* translators: accessibility text */
(0,o.__)("Move down (%s)","preferred-languages"),/* translators: keyboard shortcut (Arrow Down) */
(0,o.__)("Down","preferred-languages")),label:/* translators: keyboard shortcut (Arrow Down) */
(0,o.__)("Down","preferred-languages"),disabled:i,onClick:n},(0,o.__)("Move Down","preferred-languages"))),(0,a.createElement)("li",null,(0,a.createElement)(s.Button,{isSecondary:!0,showTooltip:!0,"aria-keyshortcuts":"Delete","aria-label":(0,o.sprintf)(/* translators: accessibility text */
(0,o.__)("Remove from list (%s)","preferred-languages"),/* translators: keyboard shortcut (Delete / Backspace) */
(0,o.__)("Delete","preferred-languages")),label:/* translators: keyboard shortcut (Delete / Backspace) */
(0,o.__)("Delete","preferred-languages"),disabled:u,onClick:r},(0,o.__)("Remove","preferred-languages")))))}const d=function({languages:e,setLanguages:t,showOptionSiteDefault:n=!1,selectedLanguage:r,setSelectedLanguage:s}){const d=(0,l.useRef)(),p=0===e.length;(0,l.useLayoutEffect)((()=>{const e=d.current.querySelector('[aria-selected="true"]');e&&e.scrollIntoView({behavior:"smooth",block:"nearest"})}),[r,e]),(0,c.useShortcut)("preferred-languages/select-first",(a=>{a.preventDefault(),p||s(e.at(0))})),(0,c.useShortcut)("preferred-languages/select-last",(a=>{a.preventDefault(),p||s(e.at(-1))}));const f=p?"":r.locale,m=p?"active-locales-list empty-list":"active-locales-list";let v=(0,o.sprintf)(/* translators: %s: English (United States) */
(0,o.__)("Falling back to %s.","preferred-languages"),"English (United States)");return n&&(v=(0,o.__)("Falling back to Site Default.","preferred-languages")),(0,a.createElement)("div",{className:"active-locales wp-clearfix"},p&&(0,a.createElement)("div",{className:"active-locales-empty-message"},(0,o.__)("Nothing set.","preferred-languages"),(0,a.createElement)("br",null),v),(0,a.createElement)("ul",{role:"listbox","aria-labelledby":"preferred-languages-label",tabIndex:0,"aria-activedescendant":f,className:m,ref:d},e.map((e=>{const{locale:l,nativeName:t,lang:n}=e;return(0,a.createElement)("li",{key:l,role:"option","aria-selected":l===r?.locale,id:l,lang:n,className:"active-locale",onClick:()=>s(e)},t)}))),(0,a.createElement)(u,{languages:e,selectedLanguage:r,onMoveUp:()=>{t((e=>{const a=e.findIndex((({locale:e})=>e===r.locale));return i(Array.from(e),a,a-1)})),(0,g.speak)((0,o.__)("Locale moved up","preferred-languages"))},onMoveDown:()=>{t((e=>{const a=e.findIndex((({locale:e})=>e===r.locale));return i(Array.from(e),a,a+1)})),(0,g.speak)((0,o.__)("Locale moved down","preferred-languages"))},onRemove:()=>{const a=e.findIndex((({locale:e})=>e===r.locale));if(s(e[a+1]||e[a-1]),t((e=>e.filter((({locale:e})=>e!==r.locale)))),(0,g.speak)((0,o.__)("Locale removed from list","preferred-languages")),1===e.length){let e=(0,o.sprintf)(/* translators: %s: English (United States) */
(0,o.__)("No languages selected. Falling back to %s.","preferred-languages"),"English (United States)");n&&(e=(0,o.__)("No languages selected. Falling back to Site Default.","preferred-languages")),(0,g.speak)(e)}}}))},p=window.wp.keycodes;function f({installedLanguages:e,availableLanguages:l,value:t,onChange:n}){const r=e.length||l.length;return(0,a.createElement)(s.SelectControl,{"aria-label":(0,o.__)("Inactive Locales","preferred-languages"),label:(0,o.__)("Inactive Locales","preferred-languages"),hideLabelFromVision:!0,value:t,onChange:n,disabled:!r,__nextHasNoMarginBottom:!0},e.length>0&&(0,a.createElement)("optgroup",{label:(0,o._x)("Installed","translations","preferred-languages")},e.map((({locale:e,lang:l,nativeName:t})=>(0,a.createElement)("option",{key:e,value:e,lang:l},t)))),l.length>0&&(0,a.createElement)("optgroup",{label:(0,o._x)("Available","translations","preferred-languages")},l.map((({locale:e,lang:l,nativeName:t})=>(0,a.createElement)("option",{key:e,value:e,lang:l},t)))))}function m({disabled:e,onClick:l}){return(0,c.useShortcut)("preferred-languages/add",(a=>{a.preventDefault(),e||l()})),(0,a.createElement)("div",{className:"inactive-locales-controls"},(0,a.createElement)(s.Button,{isSecondary:!0,showTooltip:!0,"aria-keyshortcuts":"Alt+A","aria-label":(0,o.sprintf)(/* translators: accessibility text. %s: keyboard shortcut. */
(0,o._x)("Add to list (%s)","language","preferred-languages"),p.shortcutAriaLabel.alt("A")),label:p.displayShortcut.alt("A"),disabled:e,onClick:l},(0,o._x)("Add","language","preferred-languages")))}const v=function({languages:e,onAddLanguage:t}){const[n,r]=(0,l.useState)(e[0]);(0,l.useEffect)((()=>{n||r(e[0])}),[n,e]);const s=e.filter((({installed:e})=>Boolean(e))),c=e.filter((({installed:e})=>!e));return(0,a.createElement)("div",{className:"inactive-locales wp-clearfix"},(0,a.createElement)("div",{className:"inactive-locales-list"},(0,a.createElement)(f,{installedLanguages:s,availableLanguages:c,value:n?.locale,onChange:a=>{r(e.find((e=>a===e.locale)))}})),(0,a.createElement)(m,{onClick:()=>{t(n);const e=s.findIndex((({locale:e})=>e===n.locale)),a=c.findIndex((({locale:e})=>e===n.locale));let l;l=s[e+1],l||s[0]===n||(l=s[0]),l||(l=c[a+1],c[0]!==n&&(l=c[0])),r(l),(0,g.speak)((0,o.__)("Locale added to list","preferred-languages"))},disabled:!n}))};function _(){return(0,a.createElement)(s.Notice,{status:"warning",isDismissible:!1},(0,o.__)("Some of the languages are not installed. Re-save changes to download translations.","preferred-languages"))}function w({preferredLanguages:e}){const l=e.filter((e=>Boolean(e))).map((({locale:e})=>e)).join(",");return(0,a.createElement)("input",{type:"hidden",name:"preferred_languages",value:l})}const b=function(e){const{allLanguages:t,hasMissingTranslations:n=!1,showOptionSiteDefault:s=!1}=e,{registerShortcut:g}=(0,r.useDispatch)(c.store);(0,l.useEffect)((()=>{g({name:"preferred-languages/move-up",category:"global",description:(0,o.__)("Move language up","preferred-languages"),keyCombination:{character:"ArrowUp"}}),g({name:"preferred-languages/move-down",category:"global",description:(0,o.__)("Move language down","preferred-languages"),keyCombination:{character:"ArrowDown"}}),g({name:"preferred-languages/select-first",category:"global",description:(0,o.__)("Select first language","preferred-languages"),keyCombination:{character:"Home"}}),g({name:"preferred-languages/select-last",category:"global",description:(0,o.__)("Select last language","preferred-languages"),keyCombination:{character:"End"}}),g({name:"preferred-languages/remove",category:"global",description:(0,o.__)("Remove from list","preferred-languages"),keyCombination:{character:"Backspace"}}),g({name:"preferred-languages/add",category:"global",description:(0,o._x)("Add to list","language","preferred-languages"),keyCombination:{modifier:"alt",character:"a"}})}));const[i,u]=(0,l.useState)(e.preferredLanguages),[p,f]=(0,l.useState)(e.preferredLanguages[0]),m=t.filter((e=>!i.find((({locale:a})=>a===e.locale)))),b=i.some((({installed:e})=>!e));return(0,l.useEffect)((()=>{if(!b)return;const e=()=>{const e=document.createElement("span");e.className="spinner language-install-spinner is-active preferred-languages-spinner";const a=document.querySelector("#submit");a&&a.after(e)},a=document.querySelector("form");return a?(a.addEventListener("submit",e),()=>{a.removeEventListener("submit",e)}):void 0}),[b]),(0,a.createElement)(c.ShortcutProvider,null,(0,a.createElement)("div",{className:"preferred-languages"},(0,a.createElement)(w,{preferredLanguages:i}),(0,a.createElement)("p",null,(0,o.__)("Choose languages for displaying WordPress in, in order of preference.","preferred-languages")),(0,a.createElement)(d,{languages:i,setLanguages:u,showOptionSiteDefault:s,selectedLanguage:p,setSelectedLanguage:f}),(0,a.createElement)(v,{languages:m,onAddLanguage:e=>{u((a=>[...a,e])),f(e)}}),n&&(0,a.createElement)(_,null)))};n()((()=>{const e=window.PreferredLanguages,t=document.querySelector("#preferred-languages-root");document.querySelector(".user-language-wrap")?.replaceWith(t.parentElement.parentElement),document.querySelector(".options-general-php #WPLANG")?.parentElement?.parentElement?.replaceWith(t.parentElement.parentElement),document.querySelector(".network-admin.settings-php #WPLANG")?.parentElement?.parentElement?.replaceWith(t.parentElement.parentElement),(0,l.render)((0,a.createElement)(b,{...e}),t)}))})();