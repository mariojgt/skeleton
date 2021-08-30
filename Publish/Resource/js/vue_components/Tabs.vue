<template>
    <div class="w-full">
        <div class="tabs">
            <div
                v-for="(tab, index) in tabs"
                :key="index"
            >
                <div v-if="tab.isActive">
                    <a
                        class="tab tab-lg tab-lifted tab-active"
                        :href="tab.href"
                        @click="selectTab(tab)"
                    >
                        <i :class="tab.icon" class="fas text-base mr-1"></i>
                        {{ tab.name }}
                    </a>
                </div>
                <div v-else>
                    <a
                        class="tab tab-lg tab-lifted"
                        :href="tab.href"
                        @click="selectTab(tab)"
                    >
                        <i :class="tab.icon" class="fas text-base mr-1"></i>
                        {{ tab.name }}
                    </a>
                </div>
            </div>
        </div>
        <!-- <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded"> old layout -->
        <div class="rounded shadow">
            <div class="px-4 py-5 flex-auto">
                <div class="tab-content tab-space">
                    <div class="tabs-details">
                        <slot></slot>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "tabs",
    data() {
        return {
            tabs: [],
        };
    },
    created() {},
    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach((tab) => {
                tab.isActive = tab.name == selectedTab.name;
            });
        },
    },
};
</script>
