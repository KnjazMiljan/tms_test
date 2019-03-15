<template>
	<div>
		<div class="tabs">
			<ul class="nav nav-tabs">
				<li v-for="tab in tabs" class="nav-item">
					<a :href="tab.href" @click="selectTab(tab)" class="nav-link" :class="{ 'active' : tab.isActive }">
						{{ tab.name }}
					</a>
				</li>
			</ul>
		</div>
		<div class="tab-content">
			<slot></slot>
		</div>
	</div>
</template>

<script>
export default {
	name: 'tabs',
  	data() {
		return { 
			tabs : []
		}
	},

	created() {
		this.tabs = this.$children;
	},

	methods : {
		selectTab(selectedTab) {
			this.tabs.forEach(tab => {
				tab.isActive = (tab.name == selectedTab.name)
			});
		}
	}
}
</script>